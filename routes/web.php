<?php

Auth::routes();

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
Route::get('tin_tuc', 'Frontend\HomeController@news')->name('news');
Route::get('tin_tuc/{type}/{id}', 'Frontend\HomeController@news_group')->name('news.group');
Route::get('tin_tuc/{type}/{slug}/{id}', 'Frontend\HomeController@news_detail')->name('news.detail');

// -------- Hien thi HOAT DONG ------------- //
Route::get('hoat_dong', 'Frontend\HomeController@active')->name('active');
Route::get('hoat_dong/{type}/{id}', 'Frontend\HomeController@active_group')->name('active.group');
Route::get('hoat_dong/{type}/{slug}/{id}', 'Frontend\HomeController@active_detail')->name('active.detail');

// -------- Hien thi VAN BAN ------------- //
Route::get('van_ban', 'Frontend\HomeController@document')->name('document');
Route::get('van_ban/{type}/{id}', 'Frontend\HomeController@document_group')->name('document.group');
Route::get('van_ban/{type}/{slug}/{id}', 'Frontend\HomeController@document_detail')->name('document.detail');

// -------- Hien thi TRUONG HOC ------------- //
Route::get('truong_hoc', 'Frontend\HomeController@school')->name('school');
Route::get('truong_hoc/{slug1}/{id}', 'Frontend\HomeController@notification')->name('school.notification');
Route::get('truong_hoc/{slug2}/{id}', 'Frontend\HomeController@menu')->name('school.menu');
Route::get('truong_hoc/{slug3}/{id}', 'Frontend\HomeController@schedule')->name('school.schedule');

// -------- Hien thi THU VIEN ------------- //
Route::get('thu_vien', 'Frontend\HomeController@library')->name('library');
Route::get('thu_vien/{slug1}/{id}', 'Frontend\HomeController@lessonPlan')->name('library.lessonPlan');
//Route::get('truong_hoc/{slug2}/{id}', 'Frontend\HomeController@menu')->name('school.menu');
//Route::get('truong_hoc/{slug3}/{id}', 'Frontend\HomeController@schedule')->name('school.schedule');

// ------- Hien thi trang tinh ---------- //
Route::get('static/{slug}', 'Frontend\HomeController@staticPage')->name('static');

// Test
Route::get('/html/{name}', function ($url) {
    return view('frontend.' . $url);
});
