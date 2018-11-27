<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
  //１対多の「多」側は相手側のモデルは単数形で書く
  //なんか小文字でいいみたい
  public function user(){
    //１対多の「多」側はbelongsTo('相手の名前空間のフルパス')
    return $this->belongsTo('App\User');
  }

  public function hashTags(){
    return $this->belongsToMany('App\HashTag');
  }
}
