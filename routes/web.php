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

Route::get( '/', 'WelcomeController@index' );

Auth::routes();

#//Route::get( '/home', 'HomeController@index' )->name( 'home' );

Route::name( 'admin.' )->group( function () {
    Route::get( '/dashboard', 'DashboardController@index' )->name( 'dashboard' );

    Route::resource( 'dish', 'DishController' );
    Route::resource( 'menu', 'MenuController' );
    Route::resource( 'page', 'PageController' );
    Route::resource( 'picture', 'PictureController' );
} );

Route::get( '/{slug}', 'PageController@display' )->name( 'page.display' );
