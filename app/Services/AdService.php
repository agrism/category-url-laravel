<?php


namespace App\Services;


use App\Models\Category;
use Illuminate\Support\Facades\DB;
use stdClass;

class AdService
{
    /**
     * @var CategoryService
     */
    private $categoryService;

    public function __construct()
    {
        $this->categoryService = CategoryService::factory();
    }

    public static function factory(){
        return new self;
    }

    private $add =[];

    public function clearAd():self{
        $this->add = [];
        return $this;
    }

    public function addAdCategory(string $parentCatName, string $selectedChildName): self{
        $this->add[] = [
            'category_property_id' => $this->categoryService->getCategoryIdByName($parentCatName),
            'category_value_id' => $this->categoryService->getCategoryIdByName($selectedChildName),
        ];
        return $this;
    }

    public function createAd(string $body):self{
        $id = DB::table('ads')->insertGetId([
            'body'=> $body,
        ]);

        foreach($this->add as &$ad){
            $ad['ad_id'] = $id;
            DB::table('ad_data')->insert($ad);
        }
        return $this;
    }
}
