<?php

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
    return view('layout.index');
});

Route::get('/partnertship','PagesController@partners');

Auth::routes();

// Admin
Route::prefix('admin')->group(function(){
    Route::get('/','AdminController@login')->name('admin-login');
    Route::post('/login-admin','AdminController@login_admin')->name('login-admin');

        Route::group(['middleware' => 'CheckAdmin'], function () {
            Route::get('/home', 'AdminController@home')->name('admin_home_page');
            Route::get('/logout','AdminController@logout');
        });
});



Route::get('/home', 'HomeController@index')->name('home');
