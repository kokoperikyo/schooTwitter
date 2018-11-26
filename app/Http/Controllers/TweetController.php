<?php
//php artisan make:controller TweetControllerで作成

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tweet;

class TweetController extends Controller
{

    //認可
    public function __construct()
    {
      $this->middleware('auth',[
        //ここに書かれたメソッドはログインしてないと呼ばれずにリダイレクト
        'only' => ['create','store','edit','update','destroy']
      ]);
    }



    //ツイート一覧表示画面
    public function index(){
      // resources/views/tweetのindex.blade.phpを呼ぶ
      $getTweets = Tweet::all();

      return view('tweet.index',[
        //こうするとindex.blade.phpで$tweetsという変数名で$getTweetsを使える
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
      //バリデーション
      $this->validate($request,[
        'body' => ['required','string','max:225']
      ]);

      $tweet = new Tweet;//Tweetモデルを読んで新しいレコードを作るよ！
      $tweet->body = $request->input('body');//Tweetテーブルのbodyに追加
      $tweet->user_id = $request->user()->id;//今ログインしているユーザーのidを差し込む
      $tweet->save();//保存して新しいレコードが作られる

      //これでツイートが新規投稿された時にflash_messageという名前でフラッシュデータが作られる
      $request->session()->flash('flash_message','ツイートの新規投稿は無事に完了しました');

      return redirect('/tweets');//Route::get('/tweets', 'TweetController@index');に対応
    }

    //tweetの詳細表示画面へ
    public function show($tweetId){
      //idをもとにそのツイートの情報を取得する
      $tweet = Tweet::find($tweetId);

      //ツイートの情報を$tweetで扱えるようにしてshow.blade.phpに飛ぶ
      return view('tweet.show',[
        'tweet' => $tweet
      ]);
    }

    //更新（編集）画面に移動
    public function edit($tweetId){
      $tweet = Tweet::find($tweetId);

      return view('tweet.edit',[
        'tweet' => $tweet
      ]);
    }


    //update処理を行う
    //$requestには更新するための入力内容が入っている
    public function update(Request $request,$tweetId){
      $tweet = Tweet::find($tweetId);
      $tweet->body = $request->input('body');//編集画面の投稿ボタンのinputタグのnameがbodyなのでこれで更新内容が取得できる。そんで上書き代入してる
      $tweet->save();

      return redirect('/tweets');//Route::get('/tweets', 'TweetController@index');に対応

    }

    //削除処理を行う
    public function destroy($tweetId){
      $tweet = Tweet::find($tweetId);
      $tweet->delete();//これだけで削除できる。素晴らしい

      return redirect('/tweets');//Route::get('/tweets', 'TweetController@index');に対応

    }


}
