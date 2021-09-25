<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('categories','Api\CategoryController@index');
Route::get('products','Api\ProductController@index');
Route::get('sliders','Api\SliderController@index');
Route::get('hot-products','Api\ProductController@hot_products');
Route::get('products-by-category/{id}','Api\ProductController@products_by_category');
Route::post('register','Api\UserController@register');
Route::post('login','Api\UserController@login');
Route::post('shipping','Api\ShippingController@store');
Route::post('make-payment','Api\PaymentController@pay');