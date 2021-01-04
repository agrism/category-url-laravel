<?php


namespace Database\Seeders\Categories;


class Root extends AbstractCategories
{
	public function addData(&$data = [])
	{
		$data = array_merge($data, [
			'root' => null,
			'work' => ['parent_id' => 'root', 'priority' => 10],
			'transport' => ['parent_id' => 'root', 'priority' => 9],
			'real-estate' => ['parent_id' => 'root', 'priority' => 8]
		]);
	}

	public function generatePath()
	{
		// TODO: Implement generatePath() method.
	}

}