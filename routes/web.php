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


Route::get('dashboard', 'DashboardController@index');

// Categories

Route::get('all-categories', 'CategoryController@index');
Route::post('post-category-form','CategoryController@store');
Route::get('create-category', 'CategoryController@create');
Route::get('edit-category/{id}', 'CategoryController@edit');
Route::post('update-category/{id}', 'CategoryController@update');
Route::get('delete-category/{id}', 'CategoryController@destroy');

// Products

Route::get('all-products', 'ProductController@index');
Route::post('post-product-form','ProductController@store');
Route::get('create-product', 'ProductController@create');
Route::get('edit-product/{id}', 'ProductController@edit');
Route::post('update-product/{id}', 'ProductController@update');
Route::get('delete-product/{id}', 'ProductController@destroy');


// Sliders
Route::get('create-slider', 'SliderController@create');
Route::post('post-slider-form', 'SliderController@store');
Route::get('all-sliders', 'SliderController@index');
Route::get('edit-slider/{id}', 'SliderController@edit');
Route::post('update-slider/{id}', 'SliderController@update');
Route::get('delete-slider/{id}', 'SliderController@destroy');