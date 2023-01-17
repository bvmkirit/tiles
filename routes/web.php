<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StateController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
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

\Illuminate\Support\Facades\Auth::routes();

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
Route::post('users/delete', [UserController::class ,'destroy'])->name('users.delete');
Route::resource('categories', CategoryController::class);


