<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFollowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('follows', function (Blueprint $table) {
        $table->id(); // 自動増分のID
        $table->unsignedInteger('follower_id'); // フォロワーのユーザーID（unsigned integer）自然数
        $table->unsignedInteger('followed_id'); // フォローされるユーザーID（unsigned integer）自然数
        $table->timestamps(); // created_at と updated_at

        // 外部キー制約を追加
        $table->foreign('follower_id')->references('id')->on('users')->onDelete('cascade'); //ユーザーが削除されたときに自動削除
        $table->foreign('followed_id')->references('id')->on('users')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('follows');
    }
}
