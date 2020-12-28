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

    Route::resource( 'allergen', 'AllergenController' )->except(['show']);
    Route::resource( 'dish', 'DishController' );
    Route::resource( 'event', 'EventController' );
    Route::resource( 'menu', 'MenuController' );
    Route::resource( 'page', 'PageController' );
    Route::resource( 'picture', 'PictureController' );
    Route::post( 'picture/{picture}/toggle-live', 'PictureController@toggleLive' )->name( 'picture.toggle-live' );
    Route::post( 'picture/{picture}/toggle-welcome', 'PictureController@toggleWelcome' )->name( 'picture.toggle-welcome' );
} );

Route::get( '/picture/{picture}', 'PictureController@show' )->name( 'picture.show' );
Route::get( '/event/{event}', 'EventController@show' )->name( 'event.show' );

Route::get( '/{slug}', 'PageController@display' )->name( 'page.display' );
