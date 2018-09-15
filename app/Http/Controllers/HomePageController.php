<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\{
	Category,
	Post,
	Page
	};
	
class HomePageController extends Controller
{
    
	
	public function __construct()
    {
    	view()->share('p_num', $this->p_num);
    }	
	
	
	public function __invoke(){
		$results = Post::where('is_active',1)->where('is_deleted',0)
		->latest()->paginate($this->p_num);
		
		return view('front.index', compact('results'));
		}
		
		
	public function search(Request $request){
		$key = $request->key;
		if(strlen($key)>=1){
		$results = Post::where("title","like","%$key%")->where("is_deleted",0)->where("is_active",1)
                        ->orwhere("details","like","%$key%")->where("is_deleted",0)->where("is_active",1)
                        ->orwhere("keywords","like","%$key%")->where("is_deleted",0)->where("is_active",1);
			
		$results = $results->latest()->paginate($this->p_num)->appends(array("key"=>$key));	

		return view("front.search_results",compact("results","key"));
		}
		else
	    return redirect('/');
		}	
		
		
	public function adsByCategory($id){
		
		$results  = Post::where('category_id',$id)->where('is_active',1)->where('is_deleted',0)
		->latest()->paginate($this->p_num);
		$cat_name = Category::find($id);
		return view('front.byCategory', compact('results','cat_name'));
		}	
		
		
	public function adsDetails($id){
			$result = Post::find($id);
			$result->visit_account = $result->visit_account+1;
			$result->save();
			return view('front.details', compact('result'));
		}
		
	
	public function page($id){
			$result = Page::find($id);
			$result->visit_account = $result->visit_account+1;
			$result->save();
			return view('front.page', compact('result'));
		}	
	
}
