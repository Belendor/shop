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
Route::get('/order', 'HomeController@order')->name('order');

Route::post('/order', 'OrderController@order')->name('order.post');


Route::group(['prefix' => 'admin'], function(){
    Route::get('/', 'HomeController@admin')->name('admin.index');
    Route::get('/list', 'HomeController@adminList')->name('admin.list');
 });

Route::group(['prefix' => 'product'], function(){
    Route::post('/add', 'ProductController@store')->name('product.add');
 });

Route::group(['prefix' => 'api'], function(){
    Route::post('/session', 'CartController@session')->name('api.session');
    Route::post('/session/remove', 'CartController@sessionRemove')->name('api.sessionRemove');
    Route::post('/session/add', 'CartController@sessionAdd')->name('api.sessionAdd');
    Route::post('/session/substract', 'CartController@sessionSubstract')->name('api.sessionSubstract');
    Route::get('/session', 'CartController@sessionGet')->name('api.sessionGet');
});



Route::get('all-good', 'HomeController@allGood')->name('all.good');

Route::get('paysera/accept', 'HomeController@payseraAccept')->name('paysera.accept');

Route::get('paysera/cancel', 'HomeController@payseraCancel')->name('paysera.cancel');
Route::post('paysera/callback', 'HomeController@payseraCallback')->name('paysera.callback');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
