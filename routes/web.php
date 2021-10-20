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

Route::post('/sender',function(){
    // this is the post
    $text = request()->products;
    event(new \App\Events\FormSubmitted($text));
    return redirect()->back();
});

Route::post('onscreen',function(){
    // this is the post
    $text = request()->data;
    event(new \App\Events\FormSubmitted($text));
});

Route::post('restartSlider',function(){
    // this is the post
    $text = request()->data;
    event(new \App\Events\FormSubmitted($text));
});

Route::post('nextSlider',function(){
    // this is the post
    $text = request()->data;
    event(new \App\Events\FormSubmitted($text));
});

Route::post('prevSlider',function(){
    // this is the post
    $text = request()->data;
    event(new \App\Events\FormSubmitted($text));
});
Route::post('/check_user','UserHomeController@check_user');


Route::get('/','UserHomeController@index');

Route::get('services',function(){
    return view('services');
});

Route::get('about',function(){
    return view('about');
});
Route::get('islider','SliderController@index')->name('islider');
Route::get('sliderPanel','SliderController@cpanel');
Route::post('get_data','SliderController@get_data');
Route::get('sliderSearch/{type}/{query}','SliderController@search');
Route::get('sliderProducts/{type}/{item}','SliderController@get_products');
Route::get('sliderProductss/{type}/{item}','SliderController@on_screen');



Route::get('products/{big_cat_id}','UserProductController@index');
Route::post('products/{big_cat_id}','UserProductController@index');

Route::get('cookbooks','UserProductController@cookbooks');

Route::get('brandProducts/{brand}','UserProductController@brand_products');

Route::get('get_products/{cat_id}/{id}','UserProductController@get_products');
Route::post('search/{query}','UserHomeController@search');

Route::resource('business','BusinessController')->only([
    'create','store'
]);

Route::resource('contact','ContactController')->only([
    'create','store'
]);

Route::get('productList','UserProductController@product_list');

// logged in user routes
Route::group(['middleware' => ['auth'] ], function(){
    Route::get('business/user/{user_id}','BusinessController@show_to_user');
    Route::resource('business','BusinessController')->only([
        'edit','update'
    ]);
    Route::post('/check_password','UserHomeController@check_password');
    Route::post('/change_password','UserHomeController@change_password');
});


Route::get('/login', 'HomeController@showLoginPage')->name('home');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/verifyemail/{token}', 'Auth\RegisterController@verify');
Route::get('/verifyemail/{token}', 'BusinessController@verify');


// admin routes
Route::group(['prefix' => 'administrator' ,'middleware' => ['auth', 'App\Http\Middleware\CheckUserType'] ], function(){
   
    Route::get('/', 'AdminHomeController@index')->name('administrator');
    Route::get('calendar', 'AdminHomeController@calendar');



    Route::get('accept/{user_id}','BusinessController@accept');

    Route::resource('brands','BrandController');
    Route::resource('categories','CategoryController');
    Route::resource('products','ProductController');
    Route::resource('business','BusinessController')->only([
        'index','show','destroy'
    ]);
    Route::resource('users','UserController')->only([
        'index','show'
    ]);
    Route::resource('contact','ContactController')->only([
        'index','show'
    ]);
});


