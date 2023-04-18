<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExhibitorVideosTable extends Migration
{
    public function up()
    {
        Schema::create('exhibitor_videos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->longText('video_url');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
