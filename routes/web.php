<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', 'HomePageController')->name('homepage');

Route::get('lang/{locale}', function ($locale) {
	\Session::put('locale', $locale);	
	return redirect()->route("homepage");
	});


Route::get('category/{id}', 'HomePageController@adsByCategory');
Route::get('page/{id}', 'HomePageController@page');
Route::get('addPost', 'PostController@create');
Route::post('addPost', 'PostController@store');
Route::get('showDetails/{id}', 'HomePageController@adsDetails')->name('showDetails');
Route::get('search', 'HomePageController@search');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home/noaccess', 'HomeController@noaccess');


Route::get('admin/post/delete/{id}', 'admin\PostController@destroy');
Route::get('admin/post/recovery/{id}', 'admin\PostController@recovery');
Route::get('admin/post/recyclebin', 'admin\PostController@recyclebin');
Route::get('admin/post/isdelete/{id}', 'admin\PostController@isdelete');
Route::get('admin/post/active/{id}', 'admin\PostController@active');
Route::resource('admin/post', 'admin\PostController');


Route::resource('admin/page', 'admin\PageController');


Route::get('admin/category/delete/{id}', 'admin\CategoryController@destroy');
Route::get('admin/category/recovery/{id}', 'admin\CategoryController@recovery');
Route::get('admin/category/rearrange', 'admin\CategoryController@rearrange');
Route::get('admin/category/recyclebin', 'admin\CategoryController@recyclebin');
Route::get('admin/category/isdelete/{id}', 'admin\CategoryController@isdelete');
Route::get('admin/category/active/{id}', 'admin\CategoryController@active');
Route::resource('admin/category', 'admin\CategoryController');


Route::get('admin/users/delete/{id}', 'admin\UsersController@destroy');
Route::get('admin/users/recovery/{id}', 'admin\UsersController@recovery');
Route::get('admin/users/recyclebin', 'admin\UsersController@recyclebin');
Route::get('admin/users/isdelete/{id}', 'admin\UsersController@isdelete');
Route::get('admin/users/changepassword', 'admin\UsersController@changepassword')->name('changepassword');
Route::PUT('admin/users/updatepassword', 'admin\UsersController@updatepassword');
Route::get('admin/users/permission/{id}', 'admin\UsersController@permission');
Route::post('admin/users/permission/{id}', 'admin\UsersController@setpermission');
Route::get('admin/users/active/{id}', 'admin\UsersController@active');
Route::resource('admin/users', 'admin\UsersController');