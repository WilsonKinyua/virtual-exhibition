<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatsTable extends Migration
{
    public function up()
    {
        Schema::create('chats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('message');
            $table->string('message_type');
            $table->string('status')->nullable();
            $table->longText('attachment')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
