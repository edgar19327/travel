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
Route::post('/language', 'MultiLanguage@language')->name('language');

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
    Route::get('/admin/buttons', 'InfoController@buttons')->name('buttons');
    Route::get('/admin/buttons/{id}', 'InfoController@buttonEdit')->name('buttonEdit');
    Route::put('buttonsUpdate/{id}', 'InfoController@buttonUpdate')->name('buttonUpdate');


    Route::get('/admin/aboutCrud', 'InfoController@about')->name('about');
    Route::post('aboutStore', 'InfoController@storeAbout')->name('aboutStore');
    Route::put('aboutUpdate/{id}', 'InfoController@updateAbout')->name('updateAbout');


    Route::post('guideStore', 'InfoController@storeGuide')->name('storeGuide');
    Route::put('guideUpdate/{id}', 'InfoController@updateGuide')->name('guideUpdate');
    Route::get('/admin/guideCrud', 'InfoController@guide')->name('guide');
    Route::resource('/admin/categoryCrud', 'CategoryController');
});

