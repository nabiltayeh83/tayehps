<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    
	protected $fillable = [
	'title_ar', 
	'title_en', 
	'details_ar', 
	'details_en', 
	'image', 
	'file', 
	'category_id', 
	'comment_status', 
	'is_active',
	'created_by'];
	

	public function category()
	{
		return $this->belongsTo('App\Category');	
	}
	
	
	
}

