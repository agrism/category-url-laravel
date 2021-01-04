<?php


namespace Database\Seeders\Categories;


class Color extends AbstractCategories
{
	public function addData(&$data = [])
	{
		$data = array_merge($data, [
			'color' => ['parent_id' => null, 'priority' => 0],
			'red' => ['parent_id' => 'color', 'priority' => 0],
			'blue' => ['parent_id' => 'color', 'priority' => 0],
			'yellow' => ['parent_id' => 'color', 'priority' => 0],
			'brown' => ['parent_id' => 'color', 'priority' => 0],
			'green' => ['parent_id' => 'color', 'priority' => 0],
			'black' => ['parent_id' => 'color', 'priority' => 0],
			'white' => ['parent_id' => 'color', 'priority' => 0],
		]);
	}

	public function generatePath()
	{
		// TODO: Implement generatePath() method.
	}
}