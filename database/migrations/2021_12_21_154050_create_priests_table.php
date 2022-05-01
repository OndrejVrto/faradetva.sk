<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('priests', function (Blueprint $table) {
            $table->id();

            $table->boolean('active')->default(1);
            $table->string('titles_before')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('titles_after')->nullable();
            $table->string('function')->nullable();
            $table->string('slug');
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('facebook_url', 512)->nullable();
            $table->string('twiter_name')->nullable();
            $table->string('www_page', 512)->nullable();
            $table->text('description')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }


    public function down()
    {
        Schema::dropIfExists('priests');
    }
};
