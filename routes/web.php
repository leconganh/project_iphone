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

Route::get('/',function (){
    return view('welcome');
});
Route::get('admin/login', 'UserController@getLogin');
Route::post('admin/login', 'UserController@loginAdmin')->name('login.admin');
Route::get('admin/logout', 'UserController@logout');


Route::group(['prefix' => 'admin', 'middleware' => 'adminlogin'], function () {
    Route::get('/', function () {

        return view('admin.pages.index');
    });
    Route::resource('category', 'CategoryController');
    Route::get('show_category', 'CategoryController@view_show');

    Route::resource('productType', 'ProductTypeController');
    Route::get('show_productType', 'ProductTypeController@view_show');

    Route::resource('product', 'ProductController');
    Route::get('show_product', 'ProductController@view_show');

});





