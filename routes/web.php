<?php

use Illuminate\Support\Facades\Route;



Route::get('/','PublicController@index')->name('index');
Route::get('/singleProduct/{id}','PublicController@singleProduct')->name('singleProduct');
Route::post('/add/cart','PublicController@add_cart')->name('add.cart');
Route::get('/cart','PublicController@cart')->name('cart');
Route::get('/cart/delte/{id}','PublicController@deletecart')->name('cart.delete');
Route::get('/cart/dec/{id}/{qty}','PublicController@cartdec')->name('cart.dec');
Route::get('/cart/inc/{id}/{qty}','PublicController@cartinc')->name('cart.inc');

Auth::routes(['register' => false]);

// Route::get('/home', 'HomeController@index')->name('home');
Route::prefix('admin')->group(function(){

Route::get('/dashboard','ProductController@dashboard')->name('admin.dashboard');
Route::post('/product/store','ProductController@store')->name('product.store');
Route::post('/product/update/{id}','ProductController@update')->name('product.update');
Route::get('/product/delete/{id}','ProductController@destroy')->name('product.delete');

});

