<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatRoomUserPivotTable extends Migration
{
    public function up()
    {
        Schema::create('chat_room_user', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_id_fk_8581139')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('chat_room_id');
            $table->foreign('chat_room_id', 'chat_room_id_fk_8581139')->references('id')->on('chat_rooms')->onDelete('cascade');
        });
    }
}
