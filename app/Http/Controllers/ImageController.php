<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Image;

class ImageController extends Controller

{

    public function thumbnailImage()
    {
    	return view('thumbnailImage');
    }
	

    public function thumbnailImagePost(Request $request)

    {

	    $this->validate($request, [

	    	'title' => 'required',

            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        $image = $request->file('image');

        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

        $destinationPath = public_path('images/thumbnail');

        $img = Image::make($image->getRealPath(),array(

            'width' => 100,

            'height' => 100,

            'grayscale' => false

        ));

        $img->save($destinationPath.'/'.$input['imagename']);

        $destinationPath = public_path('images');

        $image->move($destinationPath, $input['imagename']);

        /*Code for create new row in database*/

        return back()

        	->with('success','Image Upload successful')

        	->with('imageName',$input['imagename']);

    }

}