<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StateController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\frontend\Auth\LoginController;
use App\Http\Controllers\frontend\Auth\RegisterController;
use App\Http\Controllers\frontend\Auth\ForgotPasswordController;
use App\Http\Controllers\frontend\Auth\ResetPasswordController;
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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('shop', 'App\Http\Controllers\frontend\HomeController@index')->name('shop');
Route::get('/', 'App\Http\Controllers\frontend\HomeController@index')->name('front.home');


Route::group(['prefix' => 'front'], function (){
    // Authentication Routes...
    Route::get('login', [LoginController::class,'showLoginForm'])->name('front-login');
    Route::post('login', [LoginController::class,'login']);
    Route::post('logout',  [LoginController::class,'logout'])->name('front-logout');

// Registration Routes...

    Route::get('register', [RegisterController::class,'showRegistrationForm'])->name('front-register');
    Route::post('register', [RegisterController::class,'register'])->name('front.register');

// Password Reset Routes...
    Route::get('password/reset', [ForgotPasswordController::class,'showLinkRequestForm']);
    Route::post('password/email', [ForgotPasswordController::class,'sendResetLinkEmail']);
    Route::get('password/reset/{token}', [ResetPasswordController::class,'showResetForm']);
    Route::post('password/reset', [ResetPasswordController::Class,'reset']);

// Subcategory Routes
    Route::post('subcategory','App\Http\Controllers\frontend\HomeController@subcategory')->name('front.subcategory');
    Route::get('products/{category}/{subcategory}','App\Http\Controllers\frontend\HomeController@products')->name('front.products');
    Route::get('single-products/{product}','App\Http\Controllers\frontend\HomeController@product')->name('front.product');
    Route::post('products/addCart','App\Http\Controllers\frontend\HomeController@addCart')->name('front.addCart');
    Route::get('cart-lists','App\Http\Controllers\frontend\HomeController@listCart')->name('front.listCart');
    Route::get('checkout','App\Http\Controllers\frontend\HomeController@checkout')->name('front.checkout');
    Route::post('orderPlaced','App\Http\Controllers\frontend\HomeController@orderPlaced')->name('orderPlaced');
    Route::get('order-lists','App\Http\Controllers\frontend\HomeController@orderList')->name('front.orderList');


    Route::post('api/fetch-cities', 'App\Http\Controllers\frontend\HomeController@fetchCity')->name('front.fetchCity');
});


Route::group(['prefix' => 'admin'], function () {
    \Illuminate\Support\Facades\Auth::routes();
    Route::group(['middleware' => 'is_admin'], function () {
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        Route::name('home.')->group(function () {
            Route::get('/change-multiple-status', 'App\Http\Controllers\HomeController@changeMultipleStatus')->name('change-multiple-status');
            Route::get('/delete-multiple', 'App\Http\Controllers\HomeController@deleteMultiple')->name('delete-multiple');
        });
        Route::resource('states', StateController::class);
        Route::resource('cities', CityController::class);
        Route::get('settings', 'App\Http\Controllers\SettingController@setting')->name('setting.index');
        Route::put('settings/update/{id}', 'App\Http\Controllers\SettingController@update')->name('setting.update');
        Route::resource('users', UserController::class);
        Route::post('users/delete', [UserController::class, 'destroy'])->name('users.delete');
        Route::resource('categories', CategoryController::class);
        Route::resource('products', ProductController::class);
        Route::post('products/img-delete', [ProductController::class, 'deleteImage'])->name('products.image.delete');
        Route::group(['prefix' => 'orders'], function () {
            Route::get('index', [OrderController::class, 'index'])->name('orders.index');
            Route::get('show/{id}', [OrderController::class, 'show'])->name('orders.show');
        });
    });
});
