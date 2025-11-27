<?php
/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.'], function() {

    Auth::routes();
    Route::group(['middleware' => ['auth:admin']], function() {

        Route::get('/', 'HomeController@index')->name('home');

        // User
        Route::resource('user', 'UserController');
        Route::get('/user/{id}', 'UserController@show')->name('view-data');
        Route::get('/user/notification/{id}', 'UserController@notification')->name('view-notification');

        //profile
        Route::get('/profile/index', 'ProfileController@index')->name('profile.index');
        Route::put('/profile/update/{id}', 'ProfileController@update')->name('profile.update');
        Route::get('/profile/change-password', 'ProfileController@viewChangePassword')->name('profile.change-password');
        Route::put('/profile/update-password/{id}', 'ProfileController@updatePassword')->name('profile.update-password');
        Route::put('/profile/update-image', 'ProfileController@updateImage')->name('profile.update-image');
        Route::get('/profile/recent-login', 'ProfileController@viewRecentLogin')->name('profile.recent-login');

        //contact us
        Route::group(['prefix' => 'contact-us', 'as' => 'contact-us.'], function () {
            Route::get('/', 'ContactUsController@index')->name('index');
            Route::get('/contact-us/message/{contactUs:id}', 'ContactUsController@message')->name('message');
            Route::get('/get-message', 'ContactUsController@getMessages')->name('get-message');
        });

    });
});
