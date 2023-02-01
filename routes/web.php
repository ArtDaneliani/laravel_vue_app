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

Route::get('/', 'MainController@index')->name('main.index');
Route::get('/home', 'MainController@index')->name('main.index');

Route::get('/welcome', 'VueController@index')->name('welcome.index');


Route::get('/products', 'ProductController@index')->name('product.index');
Route::post('/products', 'ProductController@store')->name('product.store');
Route::get('/products/create', 'ProductController@create')->name('products.create');
Route::get('/products/{product}', 'ProductController@show')->name('product.show');
Route::get('/products/{product}/edit', 'ProductController@edit')->name('product.edit');
Route::patch('/products/{product}', 'ProductController@update')->name('product.update');
Route::delete('/products/{product}', 'ProductController@destroy')->name('product.delete');


//Route::post('/products/upload', 'ProductController@image_upload')->name('product.upload');
//Route::get('/products/delete', 'ProductController@deleteProducts');

Route::get('/about', 'AboutController@index')->name('about.index');

Route::get('/review', 'ReviewController@index')->name('review.index');
Route::post('/review/check', 'ReviewController@review_check')->name('review.check');
Route::get('review/{id}','DeleteFromDbController@deleteReview');

Route::get('/support', 'SupportController@index')->name('support.index');

/*Route::get('/products/delete', 'ProductController@deleteProducts');
Route::get('/products/first', 'ProductController@firstOrCreate');
Route::get('/products/update', 'ProductController@updateOrCreate');*/

//Route::get('/user/{id}/{name}', function($id, $name) {
//    return 'ID: '.$id.'name: '.$name;
//});
//Route::get('login', function() {
//
//})->name('login');

