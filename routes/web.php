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

Auth::routes( [ 'register' => false ] );

#//Route::get( '/home', 'HomeController@index' )->name( 'home' );

Route::get( '/bild/{picture}', 'PictureController@show' )->name( 'picture.show' );
Route::get( '/event/{slug}', 'EventController@display' )->name( 'event.display' );
Route::get( '/kategorie/{slug}', 'CategoryController@display' )->name( 'category.display' );
Route::get( '/speisen/{slug}', 'DishController@display' )->name( 'dish.display' );

Route::name( 'admin.' )->group( function () {
    Route::get( '/dashboard', 'DashboardController@index' )->name( 'dashboard' );

    Route::resource( 'allergen', 'AllergenController' )->except( [ 'show' ] );

    Route::resource( 'category', 'CategoryController' );
    Route::post( 'category', 'CategoryController@index' )->name( 'category.filter' );
    Route::post( 'category/store', 'CategoryController@store' )->name( 'category.store' );
    Route::post( 'category/{category}/dish/{dish}/move-up', 'CategoryController@dishMoveUp' )->name( 'category.dish-move-up' );
    Route::post( 'category/{category}/dish/{dish}/move-down', 'CategoryController@dishMoveDown' )->name( 'category.dish-move-down' );
    Route::post( 'category/{category}/toggle-live', 'CategoryController@toggleLive' )->name( 'category.toggle-live' );

    Route::resource( 'dish', 'DishController' );
    Route::post( 'dish', 'DishController@index' )->name( 'dish.filter' );
    Route::post( 'dish/store', 'DishController@store' )->name( 'dish.store' );
    Route::post( 'dish/{dish}/toggle-live', 'DishController@toggleLive' )->name( 'dish.toggle-live' );

    Route::resource( 'dip', 'DipController' );

    Route::resource( 'event', 'EventController' );
    Route::post( 'event/{event}/toggle-live', 'EventController@toggleLive' )->name( 'event.toggle-live' );
    Route::get( 'event/{event}/picture/add', 'EventController@addPictures' )->name( 'event.add-pictures' );
    Route::post( 'event/{event}/picture/{picture}/link', 'EventController@linkPicture' )->name( 'event.link-picture' );
    Route::post( 'event/{event}/picture/{picture}/unlink', 'EventController@unlinkPicture' )->name( 'event.unlink-picture' );
    Route::get( 'event/{event}/picture/upload', 'EventController@uploadPictures' )->name( 'event.upload-pictures' );
    Route::post( 'event/{event}/picture/upload', 'EventController@storePictures' )->name( 'event.upload-pictures' );
    Route::delete( 'event/{event}/picture/{picture}', 'EventController@removePicture' )->name( 'event.remove-picture' );

    Route::resource( 'menu', 'MenuController' );
    Route::post( 'menu/{menu}/page/{page}/move-up', 'MenuController@pageMoveUp' )->name( 'menu.page-move-up' );
    Route::post( 'menu/{menu}/page/{page}/move-down', 'MenuController@pageMoveDown' )->name( 'menu.page-move-down' );

    Route::resource( 'page', 'PageController' );
    Route::post( 'page/{page}/toggle-live', 'PageController@toggleLive' )->name( 'page.toggle-live' );

    Route::resource( 'picture', 'PictureController' );
    Route::post( 'picture', 'PictureController@index' )->name( 'picture.filter' );
    Route::post( 'picture/store', 'PictureController@store' )->name( 'picture.store' );
    Route::post( 'picture/{picture}/toggle-live', 'PictureController@toggleLive' )->name( 'picture.toggle-live' );
    Route::post( 'picture/{picture}/toggle-welcome', 'PictureController@toggleWelcome' )->name( 'picture.toggle-welcome' );
} );

Route::get( '/{slug}', 'PageController@display' )->name( 'page.display' );

