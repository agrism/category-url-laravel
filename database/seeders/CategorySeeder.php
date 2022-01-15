<?php

namespace Database\Seeders;

use Illuminate\Http\Request;
use Database\Seeders\Categories\Color;
use Database\Seeders\Categories\Paths;
use App\Http\Controllers\MainController1;
use Database\Seeders\Categories\Ads;
use Database\Seeders\Categories\RealEstate;
use Database\Seeders\Categories\RealEstateFlatSeries;
use Database\Seeders\Categories\RealEstateRoom;
use Database\Seeders\Categories\Root;
use Database\Seeders\Categories\Transport;
use Database\Seeders\Categories\Work;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
	private $insertMany = [];

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$handlers = [
			Root::factory($this),
			Color::factory($this),
			RealEstateRoom::factory($this),
			RealEstateFlatSeries::factory($this),
			RealEstate::factory($this),
			Transport::factory($this),
			Work::factory($this),

			Paths::factory($this),
            Ads::factory($this),
		];

		foreach ($handlers as $handler){
			$handler->addData($this->insertMany);
		}

		$this->insertCats();

		foreach ($handlers as $handler){
			$handler->generatePath();
		}

		Cache::pull('cat_db');
		Cache::pull('cat_path');
	}

	public function getCategoryIdByName(string $name)
	{
		return $this->insertMany[$name]['id'] ?? null;
	}

	private function insertCats()
	{
		foreach ($this->insertMany as $name => &$insert) {

			if (!is_array($insert)) {
				$insert = [
					'name' => $name,
					'parent_id' => $insert,
				];
			}

			$insert['name'] = $name;

			if (!empty($insert['parent_id'])) {
				if ($id = $this->getCategoryIdByName($insert['parent_id'])) {
					$insert['parent_id'] = $id;
				} else {
					$insert['parent_id'] = null;
				}
			}


			$catId = DB::table('categories')->insertGetId($insert);
			$insert['id'] = $catId;
		}
	}

	public function getChildrenCategoriesIdsByName(string $name)
	{
		if (!$id = $this->getCategoryIdByName($name)) {
			return [];
		}

		$return = [];

		foreach ($this->insertMany as $name => $data) {
			if ($id === $data['parent_id']) {
				$return[] = $data['id'];
			}
		}

		return $return;
	}

	public function createPath($name, $data)
	{

	}

	public function addCategoryProperty(string $categoryName, string $propertyCategoryName){
		DB::table('category_properties')->insert([
			'category_id' => $this->getCategoryIdByName($categoryName),
			'category_property_id' => $this->getCategoryIdByName($propertyCategoryName),
		]);
	}

    private $route = [];

    public function clearRoute(): self{
        $this->route = [];
        return $this;
    }

    public function addRouteFragment(string $parentCatName, ?string $selectedChildName = null, int $deep=1, ?float $order = null): self
    {
        $this->route[] = [
            'route_id' => null,
            'parent_category_id' => $this->getCategoryIdByName($parentCatName),
            'selected_child_category_id' => $selectedChildName ? $this->getCategoryIdByName($selectedChildName) : null,
            'deep' => $deep,
            'order' => $order,
        ];
        return $this;
    }

    public function createRoute(string $name): self
    {
        $id = DB::table('routes')->insertGetId([
            'name' =>$name,
        ]);

        foreach ($this->route as &$route){
            $route['route_id'] = $id;
            DB::table('route_fragments')->insert($route);
        }

        return $this->clearRoute();
    }

    private $add =[];

    public function clearAd(): self{
        $this->add = [];
        return $this;
    }

    public function addAdCategory(string $parentCatName, string $selectedChildName):self{
        $this->add[] = [
            'category_property_id' => $this->getCategoryIdByName($parentCatName),
            'category_value_id' => $this->getCategoryIdByName($selectedChildName),
        ];
        return $this;
    }

    public function createAd(string $body): self{
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
