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


// Main Page
Route::get('/', function () {
    return view('layout.index');
});

// Pages
Route::get('/partnership','PagesController@partners');
// Route::get('/education','PagesController@education');
Route::get('/glossary','PagesController@get_glossary');


// Search
Route::post('/search','GlossaryController@search');

// Add Page
Route::post('/add_page','PageController@store');

// get page

 Route::get('/page/{slug}','PagesController@single')->name('single');

// Login_registration
Auth::routes();
Route::get('/logout','Auth\LoginController@logout');


// Admin
Route::prefix('admin')->group(function(){
    Route::get('/','AdminController@login')->name('admin-login');
    Route::get('/login','AdminController@login')->name('admin-login');
    Route::post('/login-admin','AdminController@login_admin')->name('login-admin');

        Route::group(['middleware' => 'CheckAdmin'], function () {
            Route::get('/logout','AdminController@logout');
            // Pages
                Route::get('/home', 'AdminController@home')->name('admin_home_page');
                Route::get('/pages','AdminController@pages')->name('admin_pages');
                Route::get('/add_page','AdminController@add_page')->name('add_page');
                Route::get('/glossary','AdminController@glossary')->name('glossary_page');
                Route::Post('/add_glossary','AdminController@add_glossary')->name('add_glossary');
                Route::post('/update_glossary/{id}','AdminController@update_glossary')->name('update_glossary');
                Route::get('/show_glossary/{id}','AdminController@show_glossary')->name('show_glossary');
                // Single Page
                Route::get('/pages/{slug}','AdminController@get_single')->name('get_single');
                Route::post('/edit_page/{id}','AdminController@edit_page')->name('edit_page');

                // Delet Page
                Route::post('/delete/{id}','AdminController@delete_page')->name('delete_page');
                // delete GLossary
                Route::post('/delete_glossary/{id}','AdminController@delete_glossary')->name('delete_glossary');
        });
});

// User Page

Route::get('/dashboard','PagesController@user_dash')->name('user_dashboard')->middleware('auth');;
Route::get('/my-broker','PagesController@my_broker')->name('my-broker')->middleware('auth');;



// Send Mail 

Route::post('/send_mail','MailController@send')->name('mail_send');

Route::get('/home', 'HomeController@index')->name('home');
