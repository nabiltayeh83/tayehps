<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
		$this->middleware('isactive');
		
    }


   public function index()
    {
        return redirect('/admin/post');
    }


	public function noaccess(){
		return view("back.noaccess");
	}


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
 
}
