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

  public function edit($userId){
    //idをもとにそのツイートの情報を取得する
    $user = User::find($userId);

    return view('user_profile.edit',[
      'user' => $user
    ]);
  }

  public function update(Request $request, $id)
  {
      $this->validate($request, [
          'introduction' => ['string', 'max:255'],
          'birthday' => ['required', 'date']
      ]);

      $user = User::find($id);
      $user_profile = $user->userProfile;
      $user_profile->introduction = $request->input('introduction');
      $user_profile->birthday = $request->input('birthday');
      $user->name = $request->input('name');
      $user->save();

      return view('user_profile.show',[
        'user' => $user
      ]);
  }

}
