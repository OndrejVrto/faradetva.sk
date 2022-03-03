<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        Schema::create('static_pages', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('url');
            $table->string('route_name')->unique();
            $table->string('slug');
            $table->string('description')->nullable();
            $table->string('keywords')->nullable();
            $table->string('author')->nullable();
            $table->string('header')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('static_pages');
    }
};
