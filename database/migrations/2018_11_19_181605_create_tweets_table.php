<?php

//php artisan make:migration create_tweets_tableで作成

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTweetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     //php artisan migrateをするとupメソッドのカラムを持つtweetsテーブルが作られる
     public function up()
     {
         Schema::create('tweets', function (Blueprint $table) {
             $table->increments('id');
             $table->string('body', '255');
             $table->timestamps();
         });
     }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tweets');
    }
}
