<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryProperty extends Model
{
	use HasFactory;

	public function category()
	{
		return $this->hasOne(Category::class, 'category_id', 'id');
	}

	public function propertyCategory()
	{
		return $this->hasOne(Category::class, 'category_property_id', 'id');
	}
}
