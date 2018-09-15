<?php
namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\{
	Post,
	Category
    };

use Image;
use Session;
use App\Http\Requests\PostRequest;

class PostController extends AdminBaseController
{
	
		
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
	$key = $request->key;

		$results = Post::where("title_ar","like","%$key%")->where("is_deleted",0)
                        ->orwhere("details_ar","like","%$key%")->where("is_deleted",0);
			
		$results = $results->latest()->paginate($this->p_num)->appends(array("key"=>$key));	
				
        return view('back.posts.index', compact('results','key'));

    }
	
	
    public function recyclebin(Request $request)
    {
		$key = $request->key;

		$results = Post::where("title_ar","like","%$key%")->where("is_deleted",1)
                        ->orwhere("details_ar","like","%$key%")->where("is_deleted",1);
			
		$results = $results->latest()->paginate($this->p_num)->appends(array("key"=>$key));	
				
        return view('back.posts.recyclebin', compact('results','key'));
    }	
	
	public function isdelete($id)
    {
		$result = Post::find($id);
		$result->is_deleted = 1;
		$result->deleted_at = date("Y-m-d H:i:s");
		$result->deleted_by = \Auth::user()->id;
		$result->save();
		Session::flash("msg","w:تمت عملية الحذف نجاح");
		echo '<script type="text/javascript">', 'history.go(-2);' , '</script>';
		return redirect('/admin/post');
    }
	
	
	
	public function active($id)
    {
		$item= Post::find($id);
        $item->is_active= 1-$item->is_active;
		$item->save();
    }
	

    public function recovery($id)
    {
		$result = Post::find($id);
		$result->is_deleted = 0;
		$result->deleted_by = 0;
		$result->save();
		Session::flash("msg","s:تمت عملية إستعادة المقال بنجاح");
        return redirect('admin/post/recyclebin');
    }	

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$categories = Category::where('is_active',1)->where('is_deleted',0)->
		pluck('category_name_ar','id');
        return view('back.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
			
		$image = $request->file('photo');
		$input['imagename'] = time().'.'.$image->getClientOriginalExtension();	
		$destinationPath = ('storage/img/thumbnail');	
		$img = Image::make($image->getRealPath(),array('width' => 320,'height' => 320,'grayscale' => false));
		$img->save($destinationPath.'/'.$input['imagename']);

		$destinationPath = ('storage/img');
		$image->move($destinationPath, $input['imagename']);

	    if($request->file('file1') != ""){
		$file = $request->file('file1')->store('upload');
		$file = substr($file, 7);
		}
		else{
			$file = '';
			}

		$post = Post::create($request->all() + ['created_by' => \Auth::user()->id, 
		'image' => $input['imagename'], 'file' => $file]);
	    Session::flash("msg","s:تم عملية الإضافة بنجاح");
	    return redirect('/admin/post/create');
			
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$result = Post::find($id);
		$categories = Category::where('is_active',1)->where('is_deleted',0)
		->pluck('category_name_ar','id');
        return view('back.posts.edit', compact('result', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
		$result = Post::find($id);
		
		$result->title_ar = $request["title_ar"];
		$result->title_en = $request["title_en"];
		$result->details_ar = $request["details_ar"];
		$result->details_en = $request["details_en"];
		$result->category_id = $request["category_id"];
		$result->is_active = $request["is_active"];
		$result->comment_status = $request["comment_status"];
	
		
       if(isset($request["photo"])){
	      
		$image = $request->file('photo');
		$input['imagename'] = time().'.'.$image->getClientOriginalExtension();	
		$destinationPath = ('storage/img/thumbnail');	
		$img = Image::make($image->getRealPath(),array('width' => 320,'height' => 320,'grayscale' => false));
		$img->save($destinationPath.'/'.$input['imagename']);
	
		$destinationPath = ('storage/img');
		$image->move($destinationPath, $input['imagename']);
		  
		$result->image = $input['imagename'];
	   }
	   
	   
	    if($request->file('file1') != ""){
		$file = $request->file('file1')->store('upload');
		$file = substr($file, 7);
		$result->file = $file;
		}

	   
	   
	   	$result->updated_by = \Auth::user()->id;
		$result->save();
		
		Session::flash("msg","s:تم عملية التعديل بنجاح");
        return redirect('/admin/post');    
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = Post::find($id);
		unlink('storage/img/'.$image->image);
		unlink('storage/img/thumbnail/'.$image->image);
		
		Post::where('id', $id)->delete();
		
		Session::flash("msg","s:تم عملية الحذف بنجاح");
		return redirect('/admin/post/recyclebin');
    }
}
