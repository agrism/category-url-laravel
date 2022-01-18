<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
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

                    $addNewAdPath = $any.'/add';

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

        return view('index', [
            'paths' => $viewPaths,
            'breadCrumb' =>$this->getBreadCrumb($any),
            'ads'=>$ads,
            'addNewAdPath' => $addNewAdPath ?? null,
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
        };

        $exploded = array_filter($segments);

        $backPath =  '/'.implode('/', $exploded);

        return view('show', [
            'ad' => $ad,
            'backPath' => $backPath,
            'breadCrumb' => $this->getBreadCrumb($backPath),
            'addNewAdPath' => $backPath.'/add',
        ]);
    }


    public function createAdd(?string $path){

        $path = '/'.$path;
        $strLen = strlen('/add');
        $pathWithoutPostficAdd = substr($path,0,  -$strLen);

        $segments = explode('/',$pathWithoutPostficAdd);

        $lastSegment= end($segments);

        if(is_numeric($lastSegment)){
            $pathWithoutPostficAdd = implode('/', $segments);
            array_pop($segments);
        }

        $pathRecord = DB::table('real_paths')->where('path', $pathWithoutPostficAdd)->first();

        $pathData = DB::table('real_path_data')
            ->where('real_path_id', $pathRecord->id)
            ->get();

        $pathData = $pathData->map(function($item){
            $item->category_parent = CategoryService::factory()->getCategoryById($item->category_parent_id);
            $item->category_children = CategoryService::factory()->categoryChildren($item->category_parent_id);
            return $item;
        });

        // dump($pathWithoutPostficAdd);

        return view('create-ad',[
            'path'=>$path,
            'pathData' => $pathData,
            'backPath' => $pathWithoutPostficAdd,
            'breadCrumb' => $this->getBreadCrumb($pathWithoutPostficAdd),
        ]);
    }

    public function prepareStoreAd(Request $request){
        return $request->all();
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

    private function getBreadCrumb(?string $path = null): array{
        $exploded = explode('/', $path);
        $exploded = array_filter($exploded);

        $breadCrumb = [
            [
                'text' => 'home',
                'href' => '/',
            ]
        ];

        $prev = '';
        foreach ( $exploded as $path){
            $prev .= '/'.$path;
            $breadCrumb[] = [
                'text' => $path,
                'href' => $prev,
            ];
        }

        return $breadCrumb;
    }

}
