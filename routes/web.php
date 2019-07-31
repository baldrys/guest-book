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
Route::get('/refresh-captcha', 'GuestBookController@refreshCaptcha')->name('refresh');
Route::post('/', 'AjaxGuestBookController@postMessage')->name('postajax');
Route::get('/paginate-messages', 'AjaxGuestBookController@ajaxGetPaginateMessages')->name('getajax');
Route::post('/ajaxsearch', 'AjaxGuestBookController@ajaxSearch')->name('ajaxsearch');