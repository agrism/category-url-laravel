<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use \Illuminate\Http\Request;


class MainController1 extends Controller
{
    private $cats = [];
    private $routes = [];
    private $categoryChildren = [];


    public function index(Request $request, ?string $any = null){
        $u = $request->segments();

        if(!$any){
            $paths = DB::table('real_paths')->where('parent_id', $any)->get();
        } else {
            $any = '/'.$any;

            if(!$path = DB::table('real_paths')->where('path', $any)->first()){
                dd('path not found!');
            }

            $paths = DB::table('real_paths')->where('parent_id', $path->id)->get();
        }


        $viewPaths = [];

        foreach ($paths as $path){

            $pathStringExploded = explode('/', $path->path);

            $viewPaths[] = [
                'text' => array_pop($pathStringExploded),
                'href' => $path->path,
            ];
        }


        $breadCrumb = [
            [
                'text' => 'home',
                'href' => '/',
            ]
        ];

        $exploded = explode('/', $any);
        $exploded = array_filter($exploded);
        // array_pop($exploded);

        $prev = '';
        foreach ( $exploded as $path){
            $prev .= '/'.$path;
            $breadCrumb[] = [
                'text' => $path,
                'href' => $prev,
            ];
        }

        return view('index', [
            'paths' => $viewPaths,
            'breadCrumb' =>$breadCrumb,
        ]);
    }


    public function createCats(){

        \DB::table('categories')->get()->each(function($cat){
            $this->cats[$cat->id] = $cat;
        });

        \DB::table('route_fragments')->get()->each(function($fragment){

            $buffer = $fragment;

            $buffer->parent_category_name = $this->cats[$fragment->parent_category_id]->name;
            $buffer->children = $this->categoryChildren($fragment->parent_category_id);

            $this->routes[$fragment->route_id][$fragment->id] = $buffer;
        });

        echo '<style>td {vertical-align: text-top;}</style>';
        echo '<table border="1">';
        echo '<tr>';
        echo '<td>';
        // dump(array_values($this->cats)[0] );
        // dump($this->routes);


        $routesParts = [];
        foreach($this->routes as $route){

            $v = [];
            $counter = 0;
            foreach ($route as $fragmentId => $fragment){
                if($counter++ === 0){
                    dump($fragment);
                }

                if($fragment->selected_child_category_id){
                    foreach ($fragment->children as $childId => $child){
                        if($childId === $fragment->selected_child_category_id){
                            $v[] = [
                                'parent' => $fragment,
                                'selected' => [$child],
                            ];
                            break;
                        }
                    }
                } else {
                    $buffChildren = [];


                    foreach ($fragment->children as $childId => $child){
                        $buffChildren[] = $child;
                    }

                    $v[] = [
                        'parent' => $fragment,
                        'selected' => $buffChildren,
                    ];
                }
            }

            $routesParts[] = $v;
        }

        $p = [];



        foreach ($routesParts as  $routesPart){
            $prev = [];
            $prevData = [];

            foreach ($routesPart as $opaIndex => $part){

                $prevBuffer = $prev;


                $prev = [];

                $explodedParts = $part['selected'];

                if(count($prevBuffer) === 0){
                    foreach ($explodedParts as $explodedPart){

                        // $prev[] = $explodedPart->name;
                        $prev[] = [
                            'path' => '/'.$explodedPart->name,
                            'data' => [
                                [
                                    'parent_cat_id' => $part['parent']->parent_category_id,
                                    'parent_name' => $part['parent']->parent_category_name,
                                    'selected_children_id' => $explodedPart->id,
                                    'selected_children_name' => $explodedPart->name,
                                ]
                            ],
                        ];
                    }
                } else {
                    foreach ($prevBuffer as $pr){
                        foreach ($explodedParts as $explodedPart){
                            // $prev[] = $pr.'/'.$explodedPart->name;

                            $prev[] = [
                                'path' => $pr['path'].'/'.$explodedPart->name,
                                'data' => array_merge($pr['data'], [[
                                    'parent_cat_id' => $part['parent']->parent_category_id,
                                    'parent_name' => $part['parent']->parent_category_name,
                                    'selected_children_id' => $explodedPart->id,
                                    'selected_children_name' => $explodedPart->name,
                                ]]),
                            ];
                        }
                    }
                }
            }

            $p[] = $prev;
        }


        $newP = [];
        // sort by path name
        foreach ($p as $pv){
            foreach ($pv as $vv){
                $newP[$vv['path']] = $vv['data'];
            }
        }

        ksort($newP);
        //remove partial paths to avoid duplicates
        $prevKey = null;
        foreach($newP as $key => $v){
            if(!$prevKey){
                $prevKey = $key;
                continue;
            }
            if(strpos($key, $prevKey) === 0){
                unset($newP[$prevKey]);
            }
            $prevKey = $key;
        }

        echo '</td>';

        echo '<td style="width: 600px;">';
        // echo 1;
        // dump($routesParts);
        // dump($p);
        // dump($newP);

        // need to add inter paths, not final paths


        dump('START need to add inter paths, not final paths');

        $newP_v2 = [];

        foreach ($newP as $path => $data){
            if(!empty($newP_v2[$path])){
                continue;
            }

            $newP_v2[$path] = $data;

            $pathSegments = explode('/', $path);

            $pathSegments = array_filter($pathSegments);

            $combinedNewPath = '';

            foreach($pathSegments as $key => $segment){

                $combinedNewPath .= '/'.$segment;

                if(empty($newP_v2[$combinedNewPath])){

                    $combinedNewPathData = [];

                    foreach (range(1, $key) as $k => $_){
                        $combinedNewPathData[] = $data[$k];
                    }

                    // dump($combinedNewPathData);

                    $newP_v2[$combinedNewPath] = $combinedNewPathData;
                }
            }
        }

        // dump($newP_v2);

        dump('END need to add inter paths, not final paths');




        DB::table('real_paths')->truncate();
        DB::table('real_path_data')->truncate();


        dump('start insert real_path_data');

        $now = Carbon::now();

        $start1 = microtime(1);
        $c1= 0;
        $c2= 0;
        $part = 10;
        $oneTenth = ROUND(count($newP_v2) / $part,0);


        foreach ($newP_v2 as $path => $data){
            if($c1 === 0 || ($c1 % $oneTenth === 0)){
                dump($c2.'% passed, length: '.ROUND((microtime(1) - $start1),2) );
                $c2 = $c2 + $part;
            }
            $c1++;


            $realPathId = DB::table('real_paths')->insertGetId([
                'path' => $path,
                'is_final' => isset($newP[$path]) ? true : false,
                'created_at' => $now,
                'updated_at' => $now,
            ]);

            $inserts = [];

            foreach ($data as $d){

                $inserts[] = [
                    'real_path_id' => $realPathId,
                    'category_parent_id' => $d['parent_cat_id'],
                    'category_children_id' => $d['selected_children_id'],
                    'created_at' => $now,
                    'updated_at' => $now,
                ];
            }

            DB::table('real_path_data')->insert($inserts);
        }

        dump('end insert real_path_data');


        $start = microtime(1);

        dump('start insert parent path ids');

        { // add parent path ids

            $realPaths = DB::table('real_paths')->get();

            $count = $realPaths->count();
            dump('total paths: '.$count);

            $part = 10;
            $oneTenth = round($count / $part, 0);
            $c1 = 0;
            $c2 = 0;

            foreach ($realPaths as $key => $path) {

                if( $c1===0 || ($c1 % $oneTenth === 0)){
                    dump($c2.'% passed, length: '.ROUND((microtime(1) - $start),2) );
                    $c2 = $c2 + $part;
                }
                $c1++;

                $pathExploded = array_values(array_filter(explode('/', $path->path)));

                foreach ($realPaths as $key2 => $path2) {
                    $pathExploded2 = array_values(array_filter(explode('/', $path2->path)));

                    if ((count($pathExploded) + 1) === count($pathExploded2)) {

                        $isChild = false;

                        foreach (range(0, (count($pathExploded) - 1)) as $index) {

                            if (!$one = $pathExploded[$index] ?? null) {
                                dd([
                                    '$pathExploded' => $pathExploded,
                                    '$index' => $index,
                                ]);
                            }

                            if (!$two = $pathExploded2[$index] ?? null) {
                                dd([
                                    '$pathExploded2' => $pathExploded2,
                                    '$index' => $index,
                                ]);
                            }

                            if ($one === $two) {
                                $isChild = true;
                            } else {
                                $isChild = false;
                                break;
                            }
                        }

                        if ($isChild) {
                            DB::table('real_paths')->whereId($path2->id)->update(['parent_id' => $path->id]);
                        }
                    }
                }
            }
        }

        dump('finish insert parent path ids, length: '.(microtime(1)-$start));


        echo '</td>';

        echo '</tr>';
        echo '</table>';
    }


    public function index1(){

        \DB::table('categories')->get()->each(function($cat){
            $this->cats[$cat->id] = $cat;
        });


        // dump($this->>cats);

        $routes = [];

        \DB::table('routes')
            ->selectRaw('routes.id, route_fragments.parent_category_id, route_fragments.deep, route_fragments.selected_child_category_id')
            // ->selectRaw('routes.id, route_fragments.deep, route_fragments.selected_child_category_id')
            ->leftJoin('route_fragments', 'routes.id', '=', 'route_fragments.route_id')
            ->leftJoin('categories', 'route_fragments.id', '=', 'categories.id')
            ->orderBy('route_fragments.order', 'asc')
            ->orderBy('route_fragments.id', 'asc')
            ->get()
            ->each(function($route) use(&$routes){

                $limitChildren = [];

                if($limitChild = $route->selected_child_category_id){
                    $limitChildren[] = $limitChild;
                }

                $routes[$route->id][] = [
                    'parent' => [
                        'id' => $route->parent_category_id,
                        'name' => $this->cats[$route->parent_category_id]->name,
                    ],
                    'selected_child_id' => $route->selected_child_category_id,
                    'children' => $this->categoryChildren($route->parent_category_id, $limitChildren),
                ];
            });

        dump($routes);

        $out = [];
        $realRoutes = [];

        // foreach ($routes as $route){
        //     $realRoutesBuff = [];
        //     $buff = [];
        //
        //     $static = '';
        //
        //     foreach ($route as $fragment){
        //             $buff[$fragment['parent']['name']] = $fragment['children'];
        //
        //             if($selectedId = $fragment['selected_child_id']){
        //                 $static .= '/'.$this->cats[$selectedId]->name;
        //                 continue;
        //             }
        //
        //             foreach ($fragment['children'] as $child){
        //                 $realRoutesBuff[] = $child->name;
        //             }
        //     }
        //
        //     $out = $buff;
        //     $realRoutes = $realRoutesBuff;
        // }

        foreach ($routes as $route){
            foreach ($route as $index => $fragments){

                $children = array_values($fragments['children']);

                if(count($children)){
                    foreach($children as $child){

                    }

                }

                $out[] = array_values($fragments['children'])[0]->name;
            }
        }

        dump($out);
        // dump($static);
        dump($realRoutes);
    }

    private function categoryChildren(?int $id, ?array $limitIds = null): array
    {
        $children = [];

        if(!$id){
            return $children;
        }

        if(isset($this->categoryChildren[$id])){
            return $this->categoryChildren[$id];
        }

        foreach ($this->cats as $cat){
            if($cat->parent_id !== $id){
                continue;
            }
            $this->categoryChildren[$id][$cat->id] = $cat;
        }


        // if($limitIds){
        //     $limited = [];
        //     foreach ($limitIds as $limitId){
        //         $limited[$limitId] = $children[$limitId];
        //     }
        //
        //     $children = $limited;
        // }

        return $this->categoryChildren[$id] ?? [];
    }
}