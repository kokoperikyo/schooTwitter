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
Route::get('/tweets/{id}', 'TweetController@show');//各ツイートにある詳細が押されたときにそのツイートのidを持ってshowメソッドを呼ぶ
Route::get('/tweets/{id}/edit', 'TweetController@edit');//ツイート詳細の更新が押されたときにそのツイートのidを持ったままeditメソッドを呼ぶ
Route::put('/tweets/{id}', 'TweetController@update');//ツイートの更新が押されたときにのツイートのidを持ってupdateメソッドを呼ぶ、なんかよくわからんけどputを使う
Route::delete('/tweets/{id}', 'TweetController@destroy');//ツイートの削除が押されたときにのツイートのidを持ってdestroyメソッドを呼ぶ、なんかよくわからんけどdeleteを使う
