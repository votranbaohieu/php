<?php

use Illuminate\Support\Facades\Route;
use App\TheLoai;
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

Route::group(['prefix'=>'admin'], function () {
    Route::group(['prefix' => 'theloai'], function () {
        Route::get('danhsach', 'TheLoaiController@getDanhSach');
        Route::get('sua/{id}', 'TheLoaiController@getSua');
        Route::post('sua/{id}', 'TheLoaiController@postSua');
        Route::get('them', 'TheLoaiController@getThem');
        Route::post('them', 'TheLoaiController@postThem');
        Route::get('xoa/{id}', 'TheLoaiController@getXoa');
    });
    Route::group(['prefix' => 'slide'], function () {
        Route::get('danhsach', 'SlideController@getDanhSach');
        Route::get('sua/{id}', 'SlideController@getSua');
        Route::post('sua/{id}', 'SlideController@postSua');
        Route::get('them', 'SlideController@getThem');
        Route::post('them', 'SlideController@postThem');
        Route::get('Xoa/{id}', 'SlideController@getXoa');
    });
    Route::group(['prefix' => 'loaitin'], function () {
        Route::get('danhsach', 'LoaiTinController@getDanhSach');
        Route::get('sua/{id}', 'LoaiTinController@getSua');
        Route::post('sua/{id}','LoaiTinController@postSua');
        Route::get('them', 'LoaiTinController@getThem');
        Route::post('them', 'LoaiTInController@postThem');
        Route::get('xoa/{id}', 'LoaiTinController@getXoa');
    });
    Route::group(['prefix' => 'tintuc'], function () {
        Route::get('danhsach', 'TinTucController@getDanhSach');
        Route::get('them', 'TinTucController@getThem');
        Route::get('sua', 'TinTucController@getSua');
    });
    Route::group(['prefix' => 'user'], function () {
        Route::get('danhsach', 'UserController@getDanhSach');
        Route::get('sua', 'UserController@getSua');
        Route::get('them', 'UserController@getThem');
    });
});




