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
Route::get('/list/{product}', 'App\Http\Controllers\Front\IndexController@listproduct')->name('list');
Route::get('/grid/{product}', 'App\Http\Controllers\Front\IndexController@gridproduct')->name('grid');
Route::get('/profile', 'App\Http\Controllers\Front\UserController@index')->name('profile')->middleware('auth');
Route::get('/editprofile/{user}', 'App\Http\Controllers\Front\UserController@edit')->name('editprofile')->middleware('auth');
Route::post('/updateprofile/{user}', 'App\Http\Controllers\Front\UserController@update')->name('updateprofile')->middleware('auth');
Route::post('/updatepicprofile/{user}', 'App\Http\Controllers\Front\UserController@updatepicprofile')->name('updatepicprofile')->middleware('auth');


Route::get('/single/{slug}', 'App\Http\Controllers\Front\SingleController@show')->name('single');



/*Comments*/
Route::post('/addcomment/{product}', 'App\Http\Controllers\Front\CommentController@store')->name('comment.store');




/*comments*/
Route::prefix('admin/comments')->middleware('checkrole')->group(function () {

    Route::get('/', 'App\Http\Controllers\admin\CommentController@index')->name('admin.comment');
    Route::get('/edit/{comment}', 'App\Http\Controllers\admin\CommentController@edit')->name('admin.comment.edit');
    Route::post('/update/{comment}', 'App\Http\Controllers\admin\CommentController@update')->name('admin.comment.update');
    Route::get('/delete/{comment}', 'App\Http\Controllers\admin\CommentController@destroy')->name('admin.comment.delete');
    Route::get('/statuschange/{comment}', 'App\Http\Controllers\admin\CommentController@updatechangecomment')->name('statuschangecomment');
});




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



/*Adertising*/
Route::prefix('admin/adver')->middleware('checkrole')->group(function () {

    Route::get('/', 'App\Http\Controllers\admin\AdverController@index')->name('admin.adver');
    Route::get('/create', 'App\Http\Controllers\admin\AdverController@create')->name('admin.adver.create');
    Route::post('/store', 'App\Http\Controllers\admin\AdverController@store')->name('admin.adver.store');
    Route::get('/edit/{adver}', 'App\Http\Controllers\admin\AdverController@edit')->name('admin.adver.edit');
    Route::post('/update/{adver}', 'App\Http\Controllers\admin\AdverController@update')->name('admin.adver.update');
    Route::get('/delete/{adver}', 'App\Http\Controllers\admin\AdverController@destroy')->name('admin.adver.delete');
    Route::get('/statuschange/{adver}', 'App\Http\Controllers\admin\AdverController@updatechangeadver')->name('statuschangeadver');

});






/*AddToBasket*/
Route::get('ajax/request', 'App\Http\Controllers\Front\IndexController@addtoo')->name('addtoo');
Route::get('ajax/addcart', 'App\Http\Controllers\Front\ProductController@addtoosingle')->name('addtoosingle');



/*Order*/
Route::prefix('admin/orders')->middleware('checkrole')->group(function () {

    Route::get('/', 'App\Http\Controllers\admin\OrderController@index')->name('admin.order');
    Route::get('/ordernot', 'App\Http\Controllers\admin\OrderController@indexnot')->name('admin.order.not');
    Route::get('/orderok', 'App\Http\Controllers\admin\OrderController@indexok')->name('admin.order.ok');
    Route::get('/create', 'App\Http\Controllers\admin\OrderController@create')->name('admin.order.create');
    Route::post('/store', 'App\Http\Controllers\admin\OrderController@store')->name('admin.order.store');
    Route::get('/edit/{order}', 'App\Http\Controllers\admin\OrderController@edit')->name('admin.order.edit');
    Route::post('/update/{order}', 'App\Http\Controllers\admin\OrderController@update')->name('admin.order.update');
    Route::get('/delete/{order}', 'App\Http\Controllers\admin\OrderController@destroy')->name('admin.order.delete');
    Route::get('/statuschange/{order}', 'App\Http\Controllers\admin\OrderController@updatechangeorder')->name('statuschangeorder');
});





