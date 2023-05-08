<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExhibitorUserPivotTable extends Migration
{
    public function up()
    {
        Schema::create('exhibitor_user', function (Blueprint $table) {
            $table->unsignedBigInteger('exhibitor_id');
            $table->foreign('exhibitor_id', 'exhibitor_id_fk_8430606')->references('id')->on('exhibitors')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_id_fk_8430606')->references('id')->on('users')->onDelete('cascade');
        });
    }
}
