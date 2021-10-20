<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Location;
use Request;
use App\BigCategory;
use App\Business;
use DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        view()->composer('layouts.app', function($view) {
            $ip = Request::ip();
            $position = Location::get($ip);
            $big_categories = BigCategory::all();
            foreach($big_categories as $big){
                $is_data = DB::table('categories')
                        ->select(DB::raw('count(*) as data_count'))
                        ->where('big_category_id',$big->id)
                        ->first();
                $big->cat_num = $is_data->data_count;
            }
            
            $view->with('position', $position)->with('big_categories', $big_categories);
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
