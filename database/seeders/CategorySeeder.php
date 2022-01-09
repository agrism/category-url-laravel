<?php

namespace Database\Seeders;

use Illuminate\Http\Request;
use Database\Seeders\Categories\Color;
use Database\Seeders\Categories\Paths;
use App\Http\Controllers\MainController1;
use Database\Seeders\Categories\RealEstate;
use Database\Seeders\Categories\RealEstateFlatSeries;
use Database\Seeders\Categories\RealEstateRoom;
use Database\Seeders\Categories\RealEstateRooms;
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

        (new MainController1(new Request()))->createCats();

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

//		$data = [
//			'root' => [
//				2, //'transport'
//			],
//			'color' => [
//				4,//'blue',
//				5,//'red',
//			],
//			'transport' => [
//				3,//'car',
//				6,//'lorry',
//			]
//		];

		// $pathId = DB::table('paths')->insertGetId([
		// 	'name' => $name,
		// ]);
        //
        //
		// foreach ($data as $keyName => $catIds) {
		// 	// 1.element
        //
		// 	if(!$this->getCategoryIdByName($keyName)){
		// 		dd('cat not found: "'.$keyName. '" '.__FILE__.':'.__LINE__);
		// 	}
        //
		// 	$pathElementId = DB::table('path_elements')->insertGetId([
		// 		'path_id' => $pathId,
		// 		'category_id' => $this->getCategoryIdByName($keyName),
		// 	]);
        //
		// 	foreach ($catIds as $catId) {
		// 		$path_element_should_be_selected_categoriesId = DB::table('path_element_should_be_selected_categories')->insertGetId([
		// 			'path_element_id' => $pathElementId,
		// 			'category_id' => $catId,
		// 		]);
		// 	}
		// }
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
}