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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//admin/products
Route::resource('admin/products', 'ProductsController');