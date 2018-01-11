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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('html/{name}', function ($url) {
    return view('backend.' . $url);
});
// Định tuyến cho phần backend
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::resource('slide', 'SlideController');
//    Route::group(['prefix' => 'slide'], function () {
//        Route::get('index', ['as' => 'admin.slide.index', 'uses' => 'SlideController@index']);

//        Route::get('add', ['as' => 'admin.cate.getAdd', 'uses' => 'CateController@getAdd']);
//        Route::post('add', ['as' => 'admin.cate.postAdd', 'uses' => 'CateController@postAdd']);
//
//        Route::get('delete/{id}', ['as' => 'admin.cate.getDelete', 'uses' => 'CateController@getDelete']);
//
//        Route::get('edit/{id}', ['as' => 'admin.cate.getEdit', 'uses' => 'CateController@getEdit']);
//        Route::post('edit/{id}', ['as' => 'admin.cate.postEdit', 'uses' => 'CateController@postEdit']);
//    });

//    Route::group(['prefix' => 'cate'], function () {
//        // Route CATEGORY
//        Route::get('list', ['as' => 'admin.cate.getList', 'uses' => 'CateController@getList']);
//
//        Route::get('add', ['as' => 'admin.cate.getAdd', 'uses' => 'CateController@getAdd']);
//        Route::post('add', ['as' => 'admin.cate.postAdd', 'uses' => 'CateController@postAdd']);
//
//        Route::get('delete/{id}', ['as' => 'admin.cate.getDelete', 'uses' => 'CateController@getDelete']);
//
//        Route::get('edit/{id}', ['as' => 'admin.cate.getEdit', 'uses' => 'CateController@getEdit']);
//        Route::post('edit/{id}', ['as' => 'admin.cate.postEdit', 'uses' => 'CateController@postEdit']);
//    });
//
//    Route::group(['prefix' => 'product'], function () {
//        // Route PRODUCT
//        Route::get('list', ['as' => 'admin.product.getList', 'uses' => 'ProductController@getList']);
//
//        Route::get('add', ['as' => 'admin.product.getAdd', 'uses' => 'ProductController@getAdd']);
//        Route::post('add', ['as' => 'admin.product.postAdd', 'uses' => 'ProductController@postAdd']);
//
//        Route::get('delete/{id}', ['as' => 'admin.product.getDelete', 'uses' => 'ProductController@getDelete']);
//
//        Route::get('edit/{id}', ['as' => 'admin.product.getEdit', 'uses' => 'ProductController@getEdit']);
//        Route::post('edit/{id}', ['as' => 'admin.product.postEdit', 'uses' => 'ProductController@postEdit']);
//
//        // Delete image in Product Image
//        Route::get('delImg/{id}', ['as' => 'admin.product.getDelImg', 'uses' => 'ProductController@getDelImg']);
//    });
//
//    Route::group(['prefix' => 'user'], function () {
//        // Route USER
//        Route::get('list', ['as' => 'admin.user.getList', 'uses' => 'UserController@getList']);
//
//        Route::get('add', ['as' => 'admin.user.getAdd', 'uses' => 'UserController@getAdd']);
//        Route::post('add', ['as' => 'admin.user.postAdd', 'uses' => 'UserController@postAdd']);
//
//        Route::get('delete/{id}', ['as' => 'admin.user.getDelete', 'uses' => 'UserController@getDelete']);
//
//        Route::get('edit/{id}', ['as' => 'admin.user.getEdit', 'uses' => 'UserController@getEdit']);
//        Route::post('edit/{id}', ['as' => 'admin.user.postEdit', 'uses' => 'UserController@postEdit']);
//
//    });
});
