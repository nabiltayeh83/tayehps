<?php
namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\{
	Category,
	Post
	};

use App\Http\Requests\CategoryRequest;
use Session;

class CategoryController extends AdminBaseController
{
	
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		$key = $request->key;

		$results = Category::where("category_name_ar","like","%$key%")->where("is_deleted",0);
		$results = $results->latest()->paginate($this->p_num)->appends(array("key"=>$key));	
				
        return view('back.category.index', compact('results','key'));
    }
	
	
	
	public function rearrange(Request $request)
    {
		for($i=1; $i<=$request->cat_count; $i++){
			$arrange_num = "arrange_num$i";
			$id = "id$i";
			$result = Category::find($request->$id);
			$result->arrange_num = $request->$arrange_num;
			$result->save();
			}
			Session::flash("msg","s:تم إعادة ترتيب الأقسام بنجاح");
            return redirect('admin/category');
		
    }
	
	
	public function recyclebin(Request $request)
    {
		$key = $request->key;

		$results = Category::where("category_name_ar","like","%$key%")->where("is_deleted",1);
		$results = $results->latest()->paginate($this->p_num)->appends(array("key"=>$key));			
		
		
        return view('back.category.recyclebin', compact('results','key'));
    }
	
	
	public function recovery($id)
    {
		$result = Category::find($id);
		$result->is_deleted = 0;
		$result->deleted_by = 0;
		$result->save();
		Session::flash("msg","s:تم إستعادة القسم بنجاح");
        return redirect('admin/category/recyclebin');
    }
	
	
	public function active($id)
    {
		$item= Category::find($id);
        $item->is_active= 1-$item->is_active;
		$item->save();
    }

	
	
	public function isdelete($id)
    {
		$result = Category::find($id);
		$result->is_deleted = 1;
		$result->deleted_at = date("Y-m-d H:i:s");
		$result->deleted_by = \Auth::user()->id;
		$result->save();
		Session::flash("msg","s:تم حذف القسم بنجاح");
        return redirect('admin/category');
    }
	

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	return view('back.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
		$arrange_num = (Category::count()+1);
        $result = Category::create($request->all() + ['created_by' => \Auth::user()->id, 'arrange_num' => $arrange_num]);
		Session::flash("msg","s:تم إضافة القسم بنجاح");
        return redirect('admin/category');
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
        $result = Category::find($id);
		return view('back.category.edit', compact('result'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $result = Category::find($id);
		$result->category_name_ar = $request->category_name_ar;
		$result->category_name_en = $request->category_name_en;
		$result->is_active = $request->is_active;
		$result->updated_by = \Auth::user()->id;
		$result->save();
		Session::flash("msg","s:تم التعديل بنجاح");
        return redirect('admin/category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		$post_entry = Post::where("category_id",$id)->count();
		
		if($post_entry >= 1){
		    Session::flash("msg","w:لا يمكن حذف هذا القسم لوجود مقالات تابعة له");
            return redirect('admin/category/recyclebin');
			}
		else
        Category::where('id',$id)->delete();
		Session::flash("msg","s:تم حذف القسم بنجاح");
        return redirect('admin/category/recyclebin');
    }
}
