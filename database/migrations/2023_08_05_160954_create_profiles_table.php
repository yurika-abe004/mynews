<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     * 
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name'); //名前を保存するカラム
            $table->string('gender'); //性別を保存するカラム
            $table->string('hobby'); //趣味を保存するカラム
            $table->string('introduction'); // 自己紹介を保存するカラム
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * 
     * @return void
     * 
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
};
