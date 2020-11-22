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






