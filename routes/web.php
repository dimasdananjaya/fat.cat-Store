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

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => ['auth'], 'prefix' => 'sales-force-page'], function () {
    Route::get('/home', 'SalesForceController@SalesForcePage')->middleware('auth')->name('sales-force-page');
    Route::post('/add-orders', 'OrderController@store')->middleware('auth')->name('add-order');
    Route::delete('/destroy-orders/{order}', 'OrderController@destroy')->middleware('auth')->name('destroy-order');
    Route::put('/completed-orders/{order}', 'OrderController@setCompleted')->middleware('auth')->name('completed-order');
    Route::post('/profile/update', 'SalesForceController@updateProfileImage')->middleware('auth')->name('profile.update');
});

Route::group(['middleware' => ['auth'], 'prefix' => 'admin'], function () {
    Route::get('/products', 'ProductsController@index')->name('products');

});
