<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


class UserProfileController extends Controller
{
  //プロフィールの表示
  public function show($userId){
    //idをもとにそのツイートの情報を取得する
    $user = User::find($userId);

    //ツイートの情報を$tweetで扱えるようにしてshow.blade.phpに飛ぶ
    return view('user_profile.show',[
      'user' => $user
    ]);
  }
}
