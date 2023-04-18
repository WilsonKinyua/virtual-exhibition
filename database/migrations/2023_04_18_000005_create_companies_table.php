<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('slug')->unique();
            $table->string('name')->unique();
            $table->longText('address')->nullable();
            $table->string('city')->nullable();
            $table->longText('website_url')->nullable();
            $table->string('email')->unique();
            $table->string('phone_number');
            $table->longText('description')->nullable();
            $table->longText('logo')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
