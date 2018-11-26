<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
  //１対１は相手側のモデルは単数形を書く
  public function user(){
    //所属して参照idを持つ側はbelongsTo('相手の名前空間のフルパス')
    return $this->belongsTo('App\User');
  }
}
