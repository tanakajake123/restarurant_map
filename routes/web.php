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

Route::get('/', 'TopPageController@show');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function () {

    //Contact C
    Route::get('/restaurant/create', 'RestaurantPageController@create')->name("restaurant.create");
    Route::post('/restaurant/create', 'RestaurantPageController@store')->name("restaurant.store");
    Route::get('/restaurant/create/complete', 'RestaurantPageController@complete')->name("restaurant.create.complete");

    //Contact R
    Route::get('/restaurants/', 'RestaurantIndexController@index')->name("restaurant.index");
    Route::get('/restaurant/map', 'RestaurantIndexController@map')->name("restaurant.map");
    Route::get('/restaurant/{id}', 'RestaurantDetailController@show')->name("restaurant.show");

    //Recipe U
    Route::get('/restaurant/edit/{id}', 'RestaurantUpdateController@edit')->name("restaurant.edit");
    Route::post('/restaurant/edit/{id}', 'RestaurantUpdateController@update')->name("restaurant.update");

    //Recipe D
    Route::get('/restaurant/delete/{id}', 'RestaurantDeleteController@confirm')->name("restaurant.confirm");
    Route::post('/restaurant/delete/{id}', 'RestaurantDeleteController@delete')->name("restaurant.delete");



});



