<?php
//php artisan make:controller TweetControllerで作成

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tweet;

class TweetController extends Controller
{
    //ツイート一覧表示画面
    public function index(){
      // resources/views/tweetのindex.blade.phpを呼ぶ
      $getTweets = Tweet::all();

      return view('tweet.index',[
        'tweets' => $getTweets
      ]);
    }

    //新規投稿画面に遷移
    public function create(){
      return view('tweet.create');
    }

    //DBに新規保存するstoreメソッドを追加
    //$requestにはフォームに入力された情報が入っている
    public function store(Request $request){
      $tweet = new Tweet;//Tweetモデルを読んで新しいレコードを作るよ！
      $tweet->body = $request->input('body');//Tweetテーブルのbodyに追加
      $tweet->save();//保存して新しいレコードが作られる

      return redirect('/tweets');//Route::get('/tweets', 'TweetController@index');に対応
    }

}
