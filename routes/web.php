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

Route::get( '/event/{slug}', 'EventController@display' )->name( 'event.display' );

Route::name( 'admin.' )->group( function () {
    Route::get( '/dashboard', 'DashboardController@index' )->name( 'dashboard' );

    Route::resource( 'allergen', 'AllergenController' )->except( [ 'show' ] );
    Route::resource( 'dish', 'DishController' );
    Route::resource( 'dip', 'DipController' );
    Route::resource( 'event', 'EventController' );
    Route::post( 'event/{event}/toggle-live', 'EventController@toggleLive' )->name( 'event.toggle-live' );
    Route::delete( 'event/{event}/picture/{picture}', 'EventController@removePicture' )->name( 'event.remove-picture' );

    Route::resource( 'menu', 'MenuController' );
    Route::post( 'menu/{menu}/page/{page}/move-up', 'MenuController@pageMoveUp' )->name( 'menu.page-move-up' );
    Route::post( 'menu/{menu}/page/{page}/move-down', 'MenuController@pageMoveDown' )->name( 'menu.page-move-down' );

    Route::resource( 'page', 'PageController' );
    Route::post( 'page/{page}/toggle-live', 'PageController@toggleLive' )->name( 'page.toggle-live' );
    Route::post( 'page/{page}/dish/{dish}/move-up', 'PageController@dishMoveUp' )->name( 'page.dish-move-up' );
    Route::post( 'page/{page}/dish/{dish}/move-down', 'PageController@dishMoveDown' )->name( 'page.dish-move-down' );

    Route::resource( 'picture', 'PictureController' );
    Route::post( 'picture/{picture}/toggle-live', 'PictureController@toggleLive' )->name( 'picture.toggle-live' );
    Route::post( 'picture/{picture}/toggle-welcome', 'PictureController@toggleWelcome' )->name( 'picture.toggle-welcome' );
} );

Route::get( '/picture/{picture}', 'PictureController@show' )->name( 'picture.show' );

Route::get( '/{slug}', 'PageController@display' )->name( 'page.display' );

