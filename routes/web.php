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
Route::group(['namespace' => 'User'], function () {
    Route::get('/', 'LoginController@direct_login');
    Route::get('/login', 'LoginController@view_login');
    Route::get('logout', 'LoginController@logout');
    Route::get('login/shopify', 'LoginController@redirectToProvider')->name('login_shopify');
    Route::get('login/shopify/auth/callback', 'LoginController@handleProviderCallback');
    Route::get('dashboard', 'DashboardController@view');
    Route::get('get_themes','ThemesController@get_themes');
});
