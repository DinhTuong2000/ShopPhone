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

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('admin')
    ->group(function() {
        Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    });

Route::namespace('Pages')->group(function () {
    Route::get('/', 'HomePage')->name('home_page');
    Route::get('about', 'AboutPage')->name('about_page');
    Route::get('contact', 'ContactPage')->name('contact_page');
});
