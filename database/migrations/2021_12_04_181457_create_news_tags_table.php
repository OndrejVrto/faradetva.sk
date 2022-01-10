<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTagsTable extends Migration
{

    public function up()
    {
        Schema::create('news_tag', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('news_id')->unsigned();
            $table->bigInteger('tag_id')->unsigned();
            $table->foreign('news_id')->references('id')->on('news')->onDelete('cascade');
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
        });
    }


    public function down()
    {
        Schema::dropIfExists('news_tags');
    }
}
