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

Route::get('/', 'LoginController@getHomeView')->name('/');

Route::post('/userRegister', 'LoginController@getUserRegister')->name('userRegister');

Route::post('/userLogin', 'LoginController@getUserLogin')->name('userLogin');

Route::post('/adminLogin', 'LoginController@getAdminLogin')->name('adminLogin');

Route::post('/userInputRegister', 'LoginController@checkRegister')->name('userInputRegister');

Route::post('/search', 'ProductController@searchProducts')->name('search');

Route::get('/sortNewest', 'ProductController@sortNewest')->name('sortNewest');

Route::get('/sortCheapest', 'ProductController@sortCheapest')->name('sortCheapest');

Route::get('/verifyEmail','MailController@verifyEmail')->name('verifyEmail');

Route::get('/home', 'LoginController@resetHomeView')->name('home');

Route::group(['middleware' => ['verifyadmin']], function () {
    Route::get('/addAllProduct', 'AdminController@addAllProduct')->name('addAllProduct');
    Route::get('/delAllProduct','AdminController@delAllProduct')->name('delAllProduct');
    Route::get('/getSellProduct', 'AdminController@getSellProduct')->name('getSellProduct');
    Route::get('/delSingleProduct', 'AdminController@delSingleProduct')->name('delSingleProduct');
    Route::get('/addSingleProduct', 'AdminController@addSingleProduct')->name('addSingleProduct');
    Route::get('/logOutAdmin', 'LoginController@logOutAdmin')->name('logOutAdmin');
    Route::post('/adminInputRegister', 'LoginController@checkAdminRegister')->name('adminInputRegister');
    Route::post('/adminRegister', 'LoginController@getAdminRegister')->name('adminRegister');
    Route::post('/removeAdmin', 'AdminController@removeAdmin')->name('removeAdmin');
    Route::post('/getAdmin', 'AdminController@getAdmin')->name('getAdmin');
    Route::post('/adminSendMess','ChatController@adminSendMess')->name('adminSendMess');
    Route::get('/getMessForAdmin','ChatController@getMessForAdmin')->name('getMessForAdmin');
});

Route::group(['middleware' => ['verifyuser']], function () {
    
    //những route xử lý để xác thực xem user đã đăng nhập hay chưa
    //đăng nhập thì mới được ấn xem thêm
    Route::get('/seeMore', 'ProductController@getMoreProduct')->name('seeMore');
    Route::get('/productDescription', 'ProductController@productDescription')->name('productDescription');
    Route::get('/userDescription', 'UserController@userDescription')->name('userDescription');
    Route::post('/changePassword', 'UserController@changePassword')->name('changePassword');
    Route::get('/sell', 'ProductController@sellProduct')->name('sellProduct');
    Route::get('/auction', 'ProductController@auction')->name('auction'); //chuyển đến trang đấu giá
    Route::get('/logOutUser', 'LoginController@logOutUser')->name('logOutUser');
    Route::get('/productDescriptionAuction', 'ProductController@productAuctionDescription')->name('productDescriptionAuction');
    Route::get('/getProduct', 'ProductController@getProduct')->name('getProduct');
    Route::post('/pushCost', 'ProductController@pushCost')->name('pushCost');
    Route::get('/updateCost', 'ProductController@updateCost')->name('updateCost');
    Route::post('/sellSuccess' , 'ProductController@sellSuccess')->name('sellSuccess');
    Route::post('/addToCart','ProductController@addToCart')->name('addToCart');
    Route::get('/boughtProduct','ProductController@boughtProduct')->name('boughtProduct');
    Route::get('/soldProduct','ProductController@soldProduct')->name('soldProduct');
    Route::get('/showCart', 'CartController@showCart')->name('showCart');
    Route::get('/removeCart', 'CartController@removeCart')->name('removeCart');
    Route::get('/showPayment', 'CartController@showPayment')->name('showPayment');
    Route::post('/payCart', 'CartController@payCart')->name('payCart');
    Route::post('/sendMess','ChatController@sendMess')->name('sendMess');
    Route::get('/getMess','ChatController@getMess')->name('getMess');
});
