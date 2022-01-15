<?php

namespace App\Console\Commands;

use App\Services\CategoryService;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class HandlePaths extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'handle-paths';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    private $categoryService;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->categoryService = CategoryService::factory();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->handlePaths();
        return 0;
    }


    private function handlePaths(){

        DB::table('real_paths')->truncate();
        DB::table('real_path_data')->truncate();

        DB::table('categories')->get()->each(function($cat){
            $this->cats[$cat->id] = $cat;
        });

        DB::table('route_fragments')->get()->each(function($fragment){

            $buffer = $fragment;

            $buffer->parent_category_name = $this->cats[$fragment->parent_category_id]->name;
            $buffer->children = $this->categoryService->categoryChildren($fragment->parent_category_id);

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

                        // $prev[] = $explodedPart->name; - test
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

}
