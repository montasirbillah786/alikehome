<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|*/
Route::post('login', 'Api\UserController@login');
Route::post('register', 'Api\UserController@register');
Route::group(['middleware' => 'auth:api'], function(){
Route::post('details', 'Api\UserController@details');
});

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('blog','Api\BlogController@index');
Route::get('blog/{id}','Api\BlogController@indexbyid');
Route::post('blog/post','Api\BlogController@store');



/* -- start api-- */


      /* -- category api-- */

Route::get('category','Api\CategoryController@index');
Route::get('category/{id}','Api\CategoryController@indexbyid');

//Route::post('category/post','Api\CategoryController@store');


      /* -- vendor api-- */
Route::get('vendor','Api\VendorController@index');
Route::get('vendor/{id}','Api\VendorController@indexbyid');
//Route::post('vendor/post','Api\VendorController@store');


      /* -- product api-- */
Route::get('product','Api\ProductController@index');
Route::get('product/{id}','Api\ProductController@indexbyid');
//Route::post('product/post','Api\ProductController@store');
Route::get('product_image','Api\ProductController@index_image');
Route::get('product_image/{id}','Api\ProductController@indexbyid_image');

      /* -- Brand api-- */
Route::get('brand','Api\BrandController@index');
Route::get('brand/{id}','Api\BrandController@indexbyid');
//Route::post('product/post','Api\ProductController@store');

      /* -- Cart api-- */
Route::get('cart','Api\CartController@index');
Route::get('cart/{id}','Api\CartController@indexbyid');
Route::post('cart/post','Api\CartController@store');

      /* -- Order api-- */
Route::get('order','Api\OrderController@index');
Route::get('order/{id}','Api\OrderController@indexbyid');
Route::post('order/post','Api\OrderController@store');


      /* -- user api-- */
Route::get('user','Api\UserController@index');
Route::get('user/{id}','Api\UserController@indexbyid');
Route::post('user/post','Api\UserController@store');















