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
    Route::get('/home', 'SalesForceController@SalesForcePage')->name('sales-force-page');
    Route::post('/add-orders', 'OrderController@store')->name('add-order');
    Route::delete('/destroy-orders/{order}', 'OrderController@destroy')->name('destroy-order');
    Route::put('/completed-orders/{order}', 'OrderController@setCompleted')->name('completed-order');
});
