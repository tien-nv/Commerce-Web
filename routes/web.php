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

Route::get('/','LoginController@getHomeView')->name('/');

Route::post('/userRegister','LoginController@getUserRegister')->name('userRegister');

Route::post('/userLogin','LoginController@getUserLogin')->name('userLogin');

Route::post('/adminLogin','LoginController@getAdminLogin')->name('adminLogin');

Route::get('/logOutUser','LoginController@logOutUser')->name('logOutUser');

Route::post('/userInputRegister','LoginController@checkRegister')->name('userInputRegister');

Route::group(['middleware' => ['verifyadmin']], function () {
    Route::get('/addProduct','ProductController@addProduct')->name('addProduct');
    Route::get('/logOutAdmin','LoginController@logOutAdmin')->name('logOutAdmin');
    Route::post('/adminInputRegister','LoginController@checkAdminRegister')->name('adminInputRegister');
    Route::post('/adminRegister','LoginController@getAdminRegister')->name('adminRegister');
    Route::post('/removeAdmin','AdminController@removeAdmin')->name('removeAdmin');
    Route::post('/getAdmin','AdminController@getAdmin')->name('getAdmin');
});

Route::group(['middleware' => ['verifyuser']], function(){
    //những route xử lý để xác thực xem user đã đăng nhập hay chưa
    //đăng nhập thì mới được ấn xem thêm
    Route::get('/seeMore','ProductController@getMoreProduct')->name('seeMore');
    Route::get('/productDescription','ProductController@productDescription')->name('productDescription');
    Route::get('/userDescription','UserController@userDescription')->name('userDescription');
    Route::post('/changePassword','UserController@changePassword')->name('changePassword');
});
Route::get('/getProduct','ProductController@getProduct')->name('getProduct');

Route::get('/sell', 'ProductController@sellProduct')-> name('sellProduct');
