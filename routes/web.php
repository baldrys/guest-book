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

Route::get('/', 'GuestBookController@index');
Route::get('/ajax-refresh-captcha', 'GuestBookController@ajaxRefreshCaptcha')->name('ajaxRefresh');
Route::post('/ajax-add', 'GuestBookController@ajaxAddMessage')->name('ajaxAdd');
Route::get('/ajax-paginate-messages', 'GuestBookController@ajaxGetPaginateMessages')->name('ajaxGet');
Route::post('/ajax-search', 'GuestBookController@ajaxSearch')->name('ajaxSearch');