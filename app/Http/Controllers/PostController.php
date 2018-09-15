<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{
	Category,
	Image,
	Post
	};

class PostController extends Controller
{
    
	public function create(){
			$categories = Category::where('is_active',1)->pluck('category_name','id');
			return view('front.addPost', compact('categories'));
		}
	
	public function store(Request $req){
			$post = Post::create($req->all() + ['created_by' => 1]);
			foreach($req->images as $img)
			{
					$filename = $img->store('public/img');
					$image = new Image();
					$image->image = basename($filename);
					$post->images()->save($image);
			}
			return back()->with('success', 'Done successfuly');
		}
	
}
