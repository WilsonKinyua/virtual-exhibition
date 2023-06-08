<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToChatsTable extends Migration
{
    public function up()
    {
        Schema::table('chats', function (Blueprint $table) {
            $table->unsignedBigInteger('chat_room_id')->nullable();
            $table->foreign('chat_room_id', 'chat_room_fk_8354941')->references('id')->on('chat_rooms');
            $table->unsignedBigInteger('sender_id')->nullable();
            $table->foreign('sender_id', 'sender_fk_8354942')->references('id')->on('users');
            $table->unsignedBigInteger('receiver_id')->nullable();
            $table->foreign('receiver_id', 'receiver_fk_8354943')->references('id')->on('users');
        });
    }
}
