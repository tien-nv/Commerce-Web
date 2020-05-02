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

Route::get('/','LoginController@getHomeView');

Route::post('/userRegister','LoginController@getUserRegister')->name('userRegister');

Route::post('/adminRegister','LoginController@getAdminRegister')->name('adminRegister');

Route::post('/userLogin','LoginController@getUserLogin')->name('userLogin');

Route::post('/adminLogin','LoginController@getAdminLogin')->name('adminLogin');

Route::get('/logOutUser','LoginController@logOutUser')->name('logOutUser');

Route::get('/logOutAdmin','LoginController@logOutAdmin')->name('logOutAdmin');

Route::post('/userInputRegister','LoginController@checkRegister')->name('userInputRegister');

Route::post('/adminInputRegister','LoginController@checkAdminRegister')->name('adminInputRegister');

Route::get('/addProduct','ProductController@addProduct')->name('addProduct');

Route::get('/getProduct','ProductController@getProduct')->name('getProduct');

Route::get('/sell', 'ProductController@sellProduct')-> name('sellProduct');