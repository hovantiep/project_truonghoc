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

// ------------ Dinh tuyen cho backend ----------------//
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
//    Route::get('/', ['as' => 'admin', 'uses' => 'HomeController@dashboard']);
    Route::get('dashboard', 'Backend\DashboardController@index')->name('dashboard.index');
    Route::resource('slide', 'Backend\SlideController');
    Route::resource('category', 'Backend\CategoryController');
    Route::resource('news', 'Backend\NewsController');
//    Route::resource('comment', 'Backend\CommentController');
});

// ----------- Dinh tuyen cho frontend -------------- //
// Trang chu
Route::get('/', 'Frontend\HomeController@index')->name('home');

// -------- Hien thi tat ca TIN TUC trong loai tin ------------- //
Route::get('news/{slug}', 'Frontend\HomeController@news')->name('news');
Route::get('news_group/{type}/{id}', 'Frontend\HomeController@news_group')->name('news.group');
Route::get('news_detail/{type}/{slug}/{id}', 'Frontend\HomeController@news_detail')->name('news.detail');

// -------- Hien thi tat ca HOAT DONG trong loai tin ------------- //
Route::get('active/{slug}', 'Frontend\HomeController@active')->name('active');
Route::get('active_group/{type}/{id}', 'Frontend\HomeController@active_group')->name('active.group');
Route::get('active_detail/{type}/{slug}/{id}', 'Frontend\HomeController@active_detail')->name('active.detail');

// -------- Hien thi tat ca VAN BAN trong loai tin ------------- //
Route::get('document/{slug}', 'Frontend\HomeController@document')->name('document');
Route::get('document_group/{type}/{id}', 'Frontend\HomeController@document_group')->name('document.group');
Route::get('document_detail/{type}/{slug}/{id}', 'Frontend\HomeController@document_detail')->name('document.detail');

// ------- Hien thi trang tinh ---------- //
Route::get('static/{slug}', 'Frontend\HomeController@staticPage')->name('static');

// -------- Hien thi Page (Trang rieng nam trong category) ---------- //
Route::get('page/{type}/{id}/{postId?}', 'Frontend\HomeController@page')->name('page');



// ------ Hien thi nhung trang co layout chung - giong voi route news nhung khong phai loai tin tuc --------- //
Route::get('common/{type}/{id}', 'Frontend\HomeController@common')->name('common');
Route::get('common_detail/{type}/{slug}/{id}', 'Frontend\HomeController@common_detail')->name('common.detail');

// ------ Trang rieng biet nam tren level 0 (co them route name trong csdl +dac biet+) ------- //
Route::get('thong_bao', 'Frontend\HomeController@thong_bao')->name('thong_bao');

// Test
Route::get('/html/{name}', function ($url) {
    return view('frontend.' . $url);
});
//Route::get('html/{name}', function ($url) {
//    return view('backend.' . $url);
//});