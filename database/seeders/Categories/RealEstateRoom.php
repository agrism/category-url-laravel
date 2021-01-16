<?php


namespace Database\Seeders\Categories;


class RealEstateRoom extends AbstractCategories
{
	public function addData(&$data = [])
	{
		$data = array_merge($data, [
			'rooms' => ['parent_id' => null, 'priority' => 0],
			'room-1' => ['parent_id' => 'rooms', 'priority' => 10],
			'room-2' => ['parent_id' => 'rooms', 'priority' => 10],
			'room-3' => ['parent_id' => 'rooms', 'priority' => 10],
			'room-4' => ['parent_id' => 'rooms', 'priority' => 10],
			'room-5' => ['parent_id' => 'rooms', 'priority' => 10],
			'room-6' => ['parent_id' => 'rooms', 'priority' => 10],
			'room-other' => ['parent_id' => 'rooms', 'priority' => 9],
		]);
	}

	public function generatePath()
	{
		// TODO: Implement generatePath() method.
	}
}