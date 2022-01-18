<?php


namespace App\Services;


use App\Models\Category;
use Illuminate\Support\Facades\DB;
use stdClass;

class CategoryService
{
    private static $cats = [];
    private static $catsNames = [];

    private static $instance;

    public static function factory(): self{

        if(!static::$instance){
            static::$instance = new self;
        }
        return static::$instance->loadCats();
    }

    public function getCategoryByName(string $name): ?object{
        return static::$cats[$name] ?? null;
    }

    public function getCategoryById(int $id): ?object{
        if(!$name = static::$catsNames[$id] ?? null){
            return null;
        }

        return $this->getCategoryByName($name);
    }

    public function getCategoryIdByName(string $name): ?int{
        return $this->getCategoryByName($name)->id ?? null;
    }

    public function categoryChildren(?int $id, ?array $limitIds = null): array
    {
        $children = [];

        if(!$id){
            return $children;
        }

        if(isset($this->categoryChildren[$id])){
            return $this->categoryChildren[$id];
        }

        foreach (static::$cats as $cat){
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



    private function loadCats(): self{
        if(!static::$cats){
            DB::table('categories')->get()->each(function($cat){
                static::$cats[$cat->name] = $cat;
                static::$catsNames[$cat->id] = $cat->name;
            });
        }
        return $this;
    }
}
