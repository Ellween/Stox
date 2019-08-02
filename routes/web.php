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
            Route::get('/logout','AdminController@logout');
            // Pages
                Route::get('/home', 'AdminController@home')->name('admin_home_page');
                Route::get('/pages','AdminController@pages')->name('admin_pages');
                Route::get('/add_page','AdminController@add_page')->name('add_page');
                Route::get('/glossary','AdminController@glossary')->name('glossary_page');
                Route::Post('/add_glossary','AdminController@add_glossary')->name('add_glossary');
                Route::get('/update_glossary','AdminController@update_glossary')->name('update_glossary');
                Route::get('/show_glossary/{id}','AdminController@show_glossary')->name('show_glossary');
        });
});



Route::get('/home', 'HomeController@index')->name('home');
