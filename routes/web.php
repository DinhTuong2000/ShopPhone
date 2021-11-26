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
Route::get('active/{token}', 'Auth\RegisterController@activation')->name('active_account');
Route::get('/home', 'App\Http\Controllers\Pages\HomePage')->name('home_page');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('admin')
    ->group(function() {
        Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    });
