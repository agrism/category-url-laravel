<?php


namespace Database\Seeders\Categories;


class RealEstateFlatSeries extends AbstractCategories
{
	public function addData(&$data = [])
	{
		$data = array_merge($data, [
			'flat-series' => ['parent_id' => null, 'priority' => 0],
			'flat-series-103' => ['parent_id' => 'flat-series', 'priority' => 10],
			'flat-series-104' => ['parent_id' => 'flat-series', 'priority' => 10],
			'flat-series-119' => ['parent_id' => 'flat-series', 'priority' => 10],
			'flat-series-467' => ['parent_id' => 'flat-series', 'priority' => 10],
			'flat-series-602' => ['parent_id' => 'flat-series', 'priority' => 10],
			'flat-series-cehu' => ['parent_id' => 'flat-series', 'priority' => 10],
			'flat-series-hruscova' => ['parent_id' => 'flat-series', 'priority' => 10],
			'flat-series-lietuviesu' => ['parent_id' => 'flat-series', 'priority' => 10],
			'flat-series-mazgimenu' => ['parent_id' => 'flat-series', 'priority' => 10],
			'flat-series-primskara' => ['parent_id' => 'flat-series', 'priority' => 10],
			'flat-series-privatmaja' => ['parent_id' => 'flat-series', 'priority' => 10],
			'flat-series-renoveta' => ['parent_id' => 'flat-series', 'priority' => 10],
			'flat-series-specprojekts' => ['parent_id' => 'flat-series', 'priority' => 10],
			'flat-series-stalina' => ['parent_id' => 'flat-series', 'priority' => 10],
			'flat-series-jaunbuve' => ['parent_id' => 'flat-series', 'priority' => 9],

		]);
	}

	public function generatePath()
	{
		// TODO: Implement generatePath() method.
	}
}