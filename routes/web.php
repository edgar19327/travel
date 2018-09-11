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
    return view('test');
});

Auth::routes();

Route::get('/', 'IndexController@index' );
Route::get('/place', 'ShowPlaceController@index' );
Route::group(['middleware' => ['role']], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/admin/index', 'AdminController@index')->name('admin_page');
    Route::resource('/admin/state', 'StateController');
    Route::resource('/admin/languageCrud', 'LanguageController');
    Route::resource('/admin/placeCrud', 'PlaceController');
    Route::resource('/admin/sliderCrud', 'SliderController');
    Route::resource('/admin/userControl', 'UsersController');
    Route::resource('/admin/blogCrud', 'BlogController');
    Route::resource('/admin/menuCrud', 'MenuController');
});

