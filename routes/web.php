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
Route::get('/tweets', 'TweetController@index');//tweetsというURLにアクセスされたらTweetControllerのindexメソッドを実行する。indexでは一覧表示
Route::get('/tweets/create', 'TweetController@create');//新規投稿画面の表示
Route::post('/tweets', 'TweetController@store');//新規投稿されたときにpostで受け取る
