<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
	'category_name_ar',
	'category_name_en',
	'arrange_num',
	'is_active',
	'created_by'
	];
	
	
	public function posts(){
			return $this->hasMany('App\Post');
	}

}
	