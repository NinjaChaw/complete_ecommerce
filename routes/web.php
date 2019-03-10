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

Route::get('/', [
    'uses'=> 'FrontEndController@index',
    'as' => 'index'
]);

//Front product
Route::get('/product/{id}', [
    'uses'=> 'FrontEndController@singleProduct',
    'as' => 'single.product'
]);

//cart add
Route::post('cart/add/{id}', [
    'uses'=> 'CartController@add_to_cart',
    'as' => 'cart.add'
]);

//cart
Route::get('cart', [
    'uses'=> 'CartController@cart',
    'as' => 'cart'
]);

//cart/delete
Route::get('cart/delete/{id}', [
    'uses'=> 'CartController@cart_delete',
    'as' => 'cart.delete'
]);

//cart/product/increment
Route::get('product/incr/{id}/{qty}', [
    'uses'=> 'CartController@incr',
    'as' => 'product.incr'
]);

//cart/product/decrement
Route::get('product/decr/{id}/{qty}', [
    'uses'=> 'CartController@decr',
    'as' => 'product.decr'
]);

//cart/rapid/add
Route::get('cart/rapid/add/{id}', [
    'uses'=> 'CartController@rapid_add',
    'as' => 'cart.rapid.add'
]);

//cart/checkout
Route::get('cart/checkout', [
    'uses'=> 'CheckoutController@index',
    'as' => 'cart.checkout'
]);

//cart/checkout (POST)
Route::post('cart/checkout', [
    'uses'=> 'CheckoutController@pay',
    'as' => 'cart.checkout'
]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//admin/products
Route::resource('admin/products', 'ProductsController');