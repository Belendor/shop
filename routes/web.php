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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin'], function(){
    Route::get('/', 'HomeController@admin')->name('admin.index');
 });

Route::group(['prprefix' => 'product'], function(){
    Route::get('/add', 'ProductController@store')->name('product.add');
 });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
