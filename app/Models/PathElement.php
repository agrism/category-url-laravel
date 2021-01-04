<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PathElement extends Model
{
    use HasFactory;

	public function category(){
		return $this->belongsTo(Category::class, 'category_id', 'id');
	}

    public function children(){
    	return $this->belongsTo(PathElementChildren::class, 'id', 'path_element_id');
	}

	public function shouldBeSelected(){
		return $this->hasMany(PathElementShouldBeSelectedCategory::class);
	}
}
