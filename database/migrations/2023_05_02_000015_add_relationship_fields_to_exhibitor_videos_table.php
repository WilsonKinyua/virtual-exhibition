<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToExhibitorVideosTable extends Migration
{
    public function up()
    {
        Schema::table('exhibitor_videos', function (Blueprint $table) {
            $table->unsignedBigInteger('exhibitor_id')->nullable();
            $table->foreign('exhibitor_id', 'exhibitor_fk_8354856')->references('id')->on('exhibitors');
        });
    }
}
