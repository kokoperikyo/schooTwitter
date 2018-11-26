<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //１対多の「１」側は相手側のモデルは複数形で書く
    public function tweets(){
      //１対多の「１」側はhasMany('相手の名前空間のフルパス')
      return $this->hasMany('App\Tweet');
    }

    //１対１は相手側のモデルは単数形を書く
    //一文字目は小文字でいいけどつなぎのところはモデル通り大文字
    public function userProfile(){
      //１対多の「１」側はhasMany('相手の名前空間のフルパス')
      return $this->hasOne('App\UserProfile');
    }
}
