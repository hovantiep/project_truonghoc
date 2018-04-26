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

// -------- Hien thi TIN TUC ------------- //
Route::get('tin_tuc/{slug}', 'Frontend\HomeController@news')->name('news');
Route::get('tin_tuc/{type}/{id}', 'Frontend\HomeController@news_group')->name('news.group');
Route::get('tin_tuc/{type}/{slug}/{id}', 'Frontend\HomeController@news_detail')->name('news.detail');

// -------- Hien thi HOAT DONG ------------- //
Route::get('hoat_dong/{slug}', 'Frontend\HomeController@active')->name('active');
Route::get('hoat_dong/{type}/{id}', 'Frontend\HomeController@active_group')->name('active.group');
Route::get('hoat_dong/{type}/{slug}/{id}', 'Frontend\HomeController@active_detail')->name('active.detail');

// -------- Hien thi VAN BAN ------------- //
Route::get('van_ban/{slug}', 'Frontend\HomeController@document')->name('document');
Route::get('van_ban/{type}/{id}', 'Frontend\HomeController@document_group')->name('document.group');
Route::get('van_ban/{type}/{slug}/{id}', 'Frontend\HomeController@document_detail')->name('document.detail');

// -------- Hien thi TRUONG HOC ------------- // la mot dang page tu do khong thuoc group
Route::get('truong_hoc/{slug}', 'Frontend\HomeController@school')->name('school');
Route::get('truong_hoc/{slug1}/{id}', 'Frontend\HomeController@notification')->name('school.notification');
Route::get('truong_hoc/{slug2}/{id}', 'Frontend\HomeController@menu')->name('school.menu');
Route::get('truong_hoc/{slug3}/{id}', 'Frontend\HomeController@schedule')->name('school.schedule');

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