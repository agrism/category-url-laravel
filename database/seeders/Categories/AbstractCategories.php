<?php


namespace Database\Seeders\Categories;


use Database\Seeders\CategorySeeder;
use Illuminate\Support\Facades\DB;

abstract class AbstractCategories
{
	protected $categorySeeder;

	public static function factory(CategorySeeder $categorySeeder){
		return new static($categorySeeder);
	}

	public function __construct(CategorySeeder $categorySeeder){
		$this->categorySeeder = $categorySeeder;
	}

	public abstract function addData(&$data = []);
	public abstract function generatePath();

}