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

Auth::routes(['register' => false]);

// Route::get('/home', 'HomeController@index')->name('home');
Route::prefix('admin')->group(function(){

Route::get('/dashboard','ProductController@dashboard')->name('admin.dashboard');
Route::post('/product/store','ProductController@store')->name('product.store');
Route::post('/product/update/{id}','ProductController@update')->name('product.update');
Route::get('/product/delete/{id}','ProductController@destroy')->name('product.delete');

});

