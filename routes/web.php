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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', 'UserController@index')->name('admin');
Route::get('/list_user', 'UserController@list_user')->name('list_user');
Route::get('/add_user', 'UserController@get_add_user')->name('add_user');
Route::post('/add_user','UserController@add_user')->name('add_user');
Route::get('/modify_user/{id}','UserController@get_modify_user')->name('modify_user');
Route::post('/modify_user','UserController@do_modify_user')->name('do_modify_user');
Route::get('/delete_user/{id}','UserController@delete_user')->name('delete_user');
Route::post('/list_user','UserController@search_user')->name('user_search');
// |--------------------------------------------------------------------------
Route::get('/list_product','ProductController@list_product')->name('list_product');
Route::get('/add_product','ProductController@get_add_product')->name('get_add_product');
Route::post('/add_product','ProductController@do_add_product')->name('do_add_product');
Route::get('/delete_product/{id}','ProductController@delete_product')->name('delete_product');
Route::get('/modify_product/{id}','ProductController@modify_product')->name('modify_product');
Route::post('/modify_product','ProductController@do_modify_product')->name('do_modify_product');
Route::post('/list_product','ProductController@search_product')->name('product_search');

