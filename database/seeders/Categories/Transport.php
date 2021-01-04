<?php


namespace Database\Seeders\Categories;


class Transport extends AbstractCategories
{
	public function addData(&$data = [])
	{
		$data = array_merge($data, [
			'car' => 'transport',
			'audi' => 'car',
			'a1' => 'audi',
			'a2' => 'audi',
			'a3' => 'audi',
			'a5' => 'audi',
			'a6' => 'audi',
			'a7' => 'audi',
			'a8' => 'audi',
			'q3' => 'audi',
			'q5' => 'audi',
			'q7' => 'audi',
			'q8' => 'audi',

			'bmw' => 'car',
			'1-series' => 'bmw',
			'2-series' => 'bmw',
			'3-series' => 'bmw',
			'4-series' => 'bmw',
			'5-series' => 'bmw',
			'6-series' => 'bmw',
			'7-series' => 'bmw',
			'8-series' => 'bmw',
			'x-series' => 'bmw',

			'vw' => 'car',
			'Polo' => 'vw',
			'Golf' => 'vw',
			'Jetta' => 'vw',
			'Passat' => 'vw',


			'lorry' => 'transport',
		]);
	}

	public function generatePath()
	{
		$root_transport_color_car = [
			'root' => [$this->categorySeeder->getCategoryIdByName('transport')],
			'color' => $this->categorySeeder->getChildrenCategoriesIdsByName('color'),
			'transport' => [$this->categorySeeder->getCategoryIdByName('car')],
		];

		$this->categorySeeder->createPath('path_1', array_merge($root_transport_color_car, [
			'car' => [$this->categorySeeder->getCategoryIdByName('audi')],
			'audi' => $this->categorySeeder->getChildrenCategoriesIdsByName('audi'),
		]));

		$this->categorySeeder->createPath('path_2', array_merge($root_transport_color_car, [
			'car' => [$this->categorySeeder->getCategoryIdByName('bmw')],
			'bmw' => $this->categorySeeder->getChildrenCategoriesIdsByName('bmw'),
		]));

		$this->categorySeeder->createPath('path_3', array_merge($root_transport_color_car, [
			'car' => [$this->categorySeeder->getCategoryIdByName('vw')],
			'vw' => $this->categorySeeder->getChildrenCategoriesIdsByName('vw'),
		]));

	}
}