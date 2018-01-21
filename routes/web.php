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
    Route::resource('post', 'Backend\PostController');
//    Route::resource('comment', 'Backend\CommentController');
});

// ----------- Dinh tuyen cho frontend -------------- //
// Trang chu
Route::get('/', 'Frontend\HomeController@index')->name('home');

// ------- Hien thi trang tinh ---------- //
Route::get('static/{slug}', 'Frontend\HomeController@staticPage')->name('static');

// -------- Hien thi Page (Trang rieng nam trong category) ---------- //
Route::get('page/{type}/{id}', 'Frontend\HomeController@page')->name('page');

// -------- Hien thi tat ca TIN TUC trong loai tin ------------- //
Route::get('news/{type}/{id}', 'Frontend\HomeController@news')->name('news');
Route::get('news_detail/{type}/{slug}/{id}', 'Frontend\HomeController@news_detail')->name('news.detail');

// ------ Hien thi nhung trang co layout chung - giong voi route news nhung khong phai loai tin tuc --------- //
Route::get('common/{type}/{id}', 'Frontend\HomeController@common')->name('common');

// ------ Trang rieng biet nam tren level 0 (co them route name trong csdl +dac biet+) ------- //
Route::get('thong_bao', 'Frontend\HomeController@thong_bao')->name('thong_bao');

//
//// ------- Tin tuc ---------- //
//// Hien thi tat ca TIN TUC trong loai tin
//Route::get('tin_tuc/{type}/{id}', 'Frontend\HomeController@tin_tuc')->name('tin_tuc');
//
//// Hien thi 1 TIN TUC thuoc 1 loai tin
//Route::get('tin_tuc_chi_tiet/{type}/{slug}/{id}', 'Frontend\HomeController@tin_tuc_chi_tiet')->name('tin_tuc_chi_tiet');
//
//// Hien thi tat ca HOAT DONG
//Route::get('hoat_dong/{type}/{id}', 'Frontend\HomeController@hoat_dong')->name('hoat_dong');
//
//// Hien thi 1 HOAT DONG
//Route::get('hoat_dong_chi_tiet/{type}/{slug}/{id}', 'Frontend\HomeController@hoat_dong_chi_tiet')->name('hoat_dong_chi_tiet');
//
//
//// ------ Trang rieng biet nam o level 1 ------- //
//// Hien thi tat ca THUC DON
//Route::get('thuc_don/{type}/{id}', 'Frontend\HomeController@thuc_don')->name('thuc_don');
//
//// Hien thi 1 THUC DON
//Route::get('thuc_don_chi_tiet/{type}/{slug}/{id}', 'Frontend\HomeController@thuc_don_chi_tiet')->name('thuc_don_chi_tiet');
//
//// Hien thi tat ca THOI KHOA BIEU
//Route::get('thoi_khoa_bieu/{type}/{id}', 'Frontend\HomeController@thoi_khoa_bieu')->name('thoi_khoa_bieu');
//
//// Hien thi 1 THOI KHOA BIEU
//Route::get('thoi_khoa_bieu_chi_tiet/{type}/{slug}/{id}', 'Frontend\HomeController@thoi_khoa_bieu_chi_tiet')->name('thoi_khoa_bieu_chi_tiet');
//

// Test
Route::get('/html/{name}', function ($url) {
    return view('frontend.' . $url);
});
//Route::get('html/{name}', function ($url) {
//    return view('backend.' . $url);
//});