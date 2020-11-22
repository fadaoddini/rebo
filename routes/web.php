<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\IndexController;
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

Auth::routes();

Route::get('/', 'App\Http\Controllers\Front\IndexController@index')->name('index');
Route::get('/profile', 'App\Http\Controllers\Front\UserController@index')->name('profile')->middleware('auth');
Route::get('/editprofile/{user}', 'App\Http\Controllers\Front\UserController@edit')->name('editprofile')->middleware('auth');
Route::post('/updateprofile/{user}', 'App\Http\Controllers\Front\UserController@update')->name('updateprofile')->middleware('auth');
Route::post('/updatepicprofile/{user}', 'App\Http\Controllers\Front\UserController@updatepicprofile')->name('updatepicprofile')->middleware('auth');


/*PanelAdmin*/
Route::get('/rebo', 'App\Http\Controllers\admin\AdminController@index')->name('rebo')->middleware('checkrole');

/*User*/
Route::get('/useradmin', 'App\Http\Controllers\admin\UserController@index')->name('useradmin');



/*UserAdmin*/
Route::prefix('admin')->group(function () {
    Route::get('/profile/{user}', 'App\Http\Controllers\admin\UserController@edit')->name('adminprofile');
    Route::post('/upadteprofile/{user}', 'App\Http\Controllers\admin\UserController@update')->name('adminupadteprofile');
    Route::get('/deleteprofile/{user}', 'App\Http\Controllers\admin\UserController@destroy')->name('adminuserdelete');
    Route::get('/statususer/{user}', 'App\Http\Controllers\admin\UserController@updatestatuse')->name('statuschange');
});



/*Slider*/
Route::prefix('admin/slider')->middleware('checkrole')->group(function () {

    Route::get('/', 'App\Http\Controllers\admin\SliderController@index')->name('admin.slider');
    Route::get('/create', 'App\Http\Controllers\admin\SliderController@create')->name('admin.slider.create');
    Route::post('/store', 'App\Http\Controllers\admin\SliderController@store')->name('admin.slider.store');
    Route::get('/edit/{slider}', 'App\Http\Controllers\admin\SliderController@edit')->name('admin.slider.edit');
    Route::post('/update/{slider}', 'App\Http\Controllers\admin\SliderController@update')->name('admin.slider.update');
    Route::get('/delete/{slider}', 'App\Http\Controllers\admin\SliderController@destroy')->name('admin.slider.delete');

});



/*Categories*/
Route::prefix('admin/categories')->middleware('checkrole')->group(function () {

    Route::get('/', 'App\Http\Controllers\admin\CategoryController@index')->name('admin.cat');
    Route::get('/create', 'App\Http\Controllers\admin\CategoryController@create')->name('admin.cat.create');
    Route::post('/store', 'App\Http\Controllers\admin\CategoryController@store')->name('admin.cat.store');
    Route::get('/edit/{category}', 'App\Http\Controllers\admin\CategoryController@edit')->name('admin.cat.edit');
    Route::post('/update/{category}', 'App\Http\Controllers\admin\CategoryController@update')->name('admin.cat.update');
    Route::get('/delete/{category}', 'App\Http\Controllers\admin\CategoryController@destroy')->name('admin.cat.delete');

});



/*Products*/
Route::prefix('admin/products')->middleware('checkrole')->group(function () {

    Route::get('/', 'App\Http\Controllers\admin\ProductController@index')->name('admin.product');
    Route::get('/create', 'App\Http\Controllers\admin\ProductController@create')->name('admin.product.create');
    Route::post('/store', 'App\Http\Controllers\admin\ProductController@store')->name('admin.product.store');
    Route::get('/edit/{product}', 'App\Http\Controllers\admin\ProductController@edit')->name('admin.product.edit');
    Route::post('/update/{product}', 'App\Http\Controllers\admin\ProductController@update')->name('admin.product.update');
    Route::get('/delete/{product}', 'App\Http\Controllers\admin\ProductController@destroy')->name('admin.product.delete');
    Route::get('/statuschange/{product}', 'App\Http\Controllers\admin\ProductController@updatechangeproduct')->name('statuschangeproduct');
});





