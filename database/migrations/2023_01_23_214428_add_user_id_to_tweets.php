<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tweets', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->after('id');

            // userテーブルのidテーブルにuser_idカラムを関連付ける。
            // user_idカラムの外部キー制約を設定。
            // tweetsテーブルのuser_idカラムにはusersテーブルのidカラムに存在する値だけが登録できるようになる。
            // つぶやきには必ず投稿者がいる。 
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tweets', function (Blueprint $table) {
            $table->dropForeign('tweets_user_id_foreign');
            $table->dropColumn('user_id');
        });
    }
};
