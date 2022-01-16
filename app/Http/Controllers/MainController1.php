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


    public function index(Request $request, ? string $any = null){
        $u = $request->segments();

        $lastSegment = end($u);

        if($lastSegment == 'add'){
            return $this->createAdd($any);
        } elseif(is_numeric($lastSegment)){
            return $this->show($any);
        }

        $cachedAds = [];

        DB::table('ads')->select(['ads.id','ads.body','ad_data.category_property_id', 'ad_data.category_value_id'])
        ->leftJoin('ad_data', 'ads.id', '=', 'ad_data.ad_id')
        ->get()
        ->each(function($item) use(&$cachedAds){
            $cachedAds[$item->id][$item->category_property_id] = $item;
        });

        // dump($cachedAds);


        $ads = [];

        if(!$any){
            $paths = DB::table('real_paths')->where('parent_id', $any)->get();
        } else {
            $any = '/'.$any;

            if(!$parent = DB::table('real_paths')->where('path', $any)->first()){
                header("Location: /");
                exit;
            } else {
                $paths = DB::table('real_paths')->where('parent_id', $parent->id)->get();
                if($parent->is_final){

                    $parentData = DB::table('real_path_data')->where('real_path_id', $parent->id)->get();

                    foreach($parentData as $parentDataItem){
                        $cachedAds = array_filter($cachedAds, function($item) use($parentDataItem){
                            $valid = false;
                            foreach($item as $catPropertyId => $ad){
                                if($ad->category_property_id == $parentDataItem->category_parent_id && $ad->category_value_id == $parentDataItem->category_children_id){
                                    $valid = true;
                                }
                            }

                            return $valid;
                        });


                    }

                    if($parentData->count()){
                        $ads = ($cachedAds);

                        $ads = array_map(function($i) use($any){
                            $firstElement = array_shift($i);

                            return [
                                'body' => $firstElement->body,
                                'href' => $any.'/'.$firstElement->id,
                            ];
                        }, $ads);

                        // dump($ads);
                    }

                }
            }
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
            'ads'=>$ads,
        ]);
    }

    public function show(string $path){
        $segments = explode('/', $path);
        $lastSegment = array_pop($segments);

        if(!is_numeric($lastSegment)){
            dd('ad id is not valid');
        }
        if(!$ad = DB::table('ads')->where('id', $lastSegment)->first()){
            dd('ad not found!');
        }

        $breadCrumb = [
            [
                'text' => 'home',
                'href' => '/',
            ]
        ];

        $exploded = array_filter($segments);

        $prev = '';
        foreach ( $exploded as $path){
            $prev .= '/'.$path;
            $breadCrumb[] = [
                'text' => $path,
                'href' => $prev,
            ];
        }

        // dump($breadCrumb);

        return view('show', [
            'ad' => $ad,
            'backPath' => '/'.implode('/', $exploded),
            'breadCrumb' => $breadCrumb,
        ]);
    }


    public function createAdd(?string $path){

        $path = '/'.$path;
        $strLen = strlen('/add');
        $pathWithoutPostficAdd = substr($path,0,  -$strLen);

        $segments = explode('/',$pathWithoutPostficAdd);
        $lastSegment= array_pop($segments);
        if(is_numeric($lastSegment)){
            $pathWithoutPostficAdd = implode('/', $segments);
        }

        $pathRecord = DB::table('real_paths')->where('path', $pathWithoutPostficAdd)->first();

        $pathData = DB::table('real_path_data')->where('real_path_id', $pathRecord->id)->get();

        return view('create-ad',[
            'path'=>$path,
        ]);
    }

    public function storeAd(Request $request){

        $path = $request->get('path');

        $path = substr($path, 0, -4);


        $pathRecord  = DB::table('real_paths')->where('path', $path)->first();

        $pathRecordData = DB::table('real_path_data')->where('real_path_id', $pathRecord->id)->get();

        $adId = DB::table("ads")->insertGetId([
            'body' => $request->get('body'),
        ]);

        foreach($pathRecordData as $item){
            $r = DB::table('ad_data')->insert([
                'ad_id' => $adId,
                'category_property_id' => $item->category_parent_id,
                'category_value_id' => $item->category_children_id,
            ]);
        }

        return redirect()->to($path);
    }


/*
    public function index1()
    {

    DB::table('categories')->get()->each(function($cat){
            $this->cats[$cat->id] = $cat;
        });


        // dump($this->>cats);

        $routes = [];

        DB::table('routes')
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
    */
}
