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

Route::get('/','HomeController@getHomeView');

Route::post('/userRegister','LoginController@getLogin')->name('userRegister');

Route::post('/','LoginController@getLogin')->name('/');

Route::post('/adminLogin','LoginController@getAdminLogin')->name('adminLogin');

Route::get('/addProduct','adminController@addProduct')->name('addProduct');