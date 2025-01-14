<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExhibitorsTable extends Migration
{
    public function up()
    {
        Schema::create('exhibitors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique();
            $table->boolean('status')->default(0)->nullable();
            $table->longText('description')->nullable();
            $table->string('slug')->nullable();
            $table->longText('website_url')->nullable();
            $table->longText('twitter_url')->nullable();
            $table->longText('linkedin_url')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
