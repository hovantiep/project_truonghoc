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
//    return view('welcome');
//});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

// Dinh tuyen cho backend
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
//    Route::get('/', ['as' => 'admin', 'uses' => 'HomeController@dashboard']);
    Route::resource('dashboard', 'Backend\DashboardController');
    Route::resource('slide', 'Backend\SlideController');
    Route::resource('category', 'Backend\CategoryController');
    Route::resource('news', 'Backend\NewsController');
    Route::resource('comment', 'Backend\CommentController');
});

// Dinh tuyen cho frontend
Route::get('/', 'Frontend\HomeController@index')->name('home');
Route::get('static/{slug}', 'Frontend\HomeController@showStatic')->name('static');
// Hien thi the loai tin thuoc danh muc
Route::get('/{category}/{slug}/{id}', 'Frontend\HomeController@showCategory')->name('category');
// Hien thi 1 tin thuoc danh muc
//Route::get('/category/{slug}/{id}', 'Frontend\HomeController@showDetail')->name('detail');

// Test
Route::get('/html/{name}', function ($url) {
    return view('frontend.' . $url);
});
//Route::get('html/{name}', function ($url) {
//    return view('backend.' . $url);
//});