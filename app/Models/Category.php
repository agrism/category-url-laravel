<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\TableDelete;
use stdClass;

class Category extends Model
{
	use HasFactory;

	private static $categories;

	private static function init()
	{
		if(!self::$categories){
			self::$categories = DB::table('categories')->get();
			return;
		}

		if (self::$categories->count() === 0) {
			self::$categories = DB::table('categories')->get();
			return;
		}
	}

	public static function getChildrenCategories($categoryId): array
	{
		self::init();

		return self::$categories->filter(function ($category) use ($categoryId) {
			return $category->parent_id === $categoryId;
		})->all();
	}


	public static function getCategoryByName(string $name): stdClass
	{
		self::init();


		if ($r = self::$categories->filter(function ($category) use ($name) {
			return $category->name == $name;
		})->first()) {
			return $r;
		}

		$cat = new stdClass;

		$cat->name = 'root';
		$cat->priority = 0;
		return $cat;
	}

	public static function getCategoryById(int $id): stdClass
	{
		self::init();

		if ($r = self::$categories->filter(function ($category) use ($id) {
			return $category->id === $id;
		})->first()) {
			return $r;
		}

		$cat = new stdClass;
		$cat->name = null;
		$cat->priority = 0;
		return $cat;
	}
}


