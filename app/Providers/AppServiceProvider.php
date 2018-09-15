<?php
namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use App\{
	Category,
    Post,
	User
    };

use Blade;

class AppServiceProvider extends ServiceProvider
{

	
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

		view()->composer('front.layouts.rightside', function($view){
				$view->with('rightsides', Post::where('is_active',1)->where('is_deleted',0)->orderBy('visit_account','desc')
				->take(3)->get());
			});

       
	   Blade::directive('buttons', function () { 

	   return __('Home'); 
	   });


		}
		
		


    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
