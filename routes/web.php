<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');

Route::group(['prefix' => 'admins', 'middleware' => 'auth'], function(){

    Route::resource('categories', 'CategoriesController');

    Route::resource('subcategories', 'SubcategoriesController');

    Route::resource('products', 'ProductController');

    Route::resource('profile', 'ProfileController');

    Route::get('products/firstimage/{slug}', [
        'uses' => 'ProductController@firstImage',
        'as' => 'products.firstimage'
    ]);


    Route::post('products/updateFirstImage/{slug}', [
        'uses' => 'ProductController@updateFirstImage',
        'as' => 'products.updateFirstImage'
    ]);



    Route::get('products/secondimage/{slug}', [
        'uses' => 'ProductController@secondImage',
        'as' => 'products.secondimage'
    ]);

    Route::post('products/updateSecondImage/{slug}', [
        'uses' => 'ProductController@updateSecondImage',
        'as' => 'products.updateSecondImage'
    ]);


    Route::get('products/thirdimage/{slug}', [
        'uses' => 'ProductController@thirdImage',
        'as' => 'products.thirdimage'
    ]);

    Route::post('products/updateThirdImage/{slug}', [
        'uses' => 'ProductController@updateThirdImage',
        'as' => 'products.updateThirdImage'
    ]);

    Route::get('/change-password', [
        'uses'=> 'AdminsController@password',
        'as' => 'change-password',
    ]);

    Route::post('/change-password', [
        'uses'=> 'AdminsController@newPassword',
        'as' => 'newPassword',
    ]);


    // Route::post('/ajax-subcat', function(Request $request){

    //     $cat_id = $request->cat_id;
    //     $subcategories = Category::where('category_id', '=', $cat_id)->get();
    //     return response()->json($categories, 200);

    // });



    // Route::get('subcategories/create', [
    //     'uses'=> 'SubcategoriesController@create',
    //     'as' => 'subcategories.create',
    // ]);


    });