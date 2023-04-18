<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExhibitorDocumentsTable extends Migration
{
    public function up()
    {
        Schema::create('exhibitor_documents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->longText('document_url');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
