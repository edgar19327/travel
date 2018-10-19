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

//Route::get('/', function () {
//    return view('test');
//});
Route::post('/language', 'MultiLanguage@language')->name('language');

Auth::routes();

Route::get('profile/{id}', 'ProfileController@views')->name('profileView');
Route::get('guide/{id}', 'ProfileController@guideView')->name('guideView');
Route::get('/views/place/{id}', 'ShowPlaceController@index' )->name('placeView');
Route::group(['prefix' => 'admin-panel'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::group(['middleware' => ['role']], function () {
    Route::get('index', 'AdminController@index')->name('admin_page');
    Route::resource('state', 'StateController');
    Route::resource('languageCrud', 'LanguageController');
    Route::resource('placeCrud', 'PlaceController');
    Route::resource('sliderCrud', 'SliderController');
    Route::resource('userControl', 'UsersController');
    Route::resource('blogCrud', 'BlogController');
    Route::resource('menuCrud', 'MenuController');
    Route::get('buttons', 'InfoController@buttons')->name('buttons');
    Route::get('buttons/{id}', 'InfoController@buttonEdit')->name('buttonEdit');



    Route::get('aboutCrud', 'InfoController@about')->name('about');

    Route::get('guideCrud', 'InfoController@guide')->name('guide');
    Route::resource('categoryCrud', 'CategoryController');
    });
    Route::put('buttonsUpdate/{id}', 'InfoController@buttonUpdate')->name('buttonUpdate');
    Route::post('aboutStore', 'InfoController@storeAbout')->name('aboutStore');
    Route::put('aboutUpdate/{id}', 'InfoController@updateAbout')->name('updateAbout');


    Route::post('guideStore', 'InfoController@storeGuide')->name('storeGuide');
    Route::put('guideUpdate/{id}', 'InfoController@updateGuide')->name('guideUpdate');
});
Route::put('profileUpdate/{id}', 'ProfileController@update')->name('profileUpdate');

Route::get('/{category?}/{state?}', 'IndexController@index' )->name('index');