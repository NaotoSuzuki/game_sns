<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ThreadController;
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

Route::get('/threads_index', 'App\Http\Controllers\ThreadController@indexThread');

Route::view('/build_thread', 'buildThread');
Route::post('/build_thread', 'App\Http\Controllers\SaveThread@saveThread');

Route::get('/thread_detail/{title}', 'App\Http\Controllers\ThreadController@showThread')->name('threadsShow');
Route::post('/thread_detail/{title}', 'App\Http\Controllers\ThreadController@showThread');
Route::post('/build_thread/post/save', 'App\Http\Controllers\ThreadController@savePost');
Route::get('/build_thread/get/replies/{thread_id}', 'App\Http\Controllers\ThreadController@getReplies');
Route::post('/build_thread/post/reply', 'App\Http\Controllers\ThreadController@postReply');

// 問い合わせ
Route::get('contact', 'App\Http\Controllers\ContactsController@index');
Route::post('contact/confirm', 'App\Http\Controllers\ContactsController@confirm');
Route::post('contact/complete', 'App\Http\Controllers\ContactsController@complete');
