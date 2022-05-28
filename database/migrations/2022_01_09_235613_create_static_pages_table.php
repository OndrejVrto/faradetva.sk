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

            $table->boolean('active')->default(0);
            $table->string('title');
            $table->string('url');
            $table->string('route_name')->unique();
            $table->string('slug');
            $table->string('description_page')->nullable();
            $table->string('keywords')->nullable();
            $table->string('author_page')->nullable();
            $table->string('header')->nullable();
            $table->boolean('check_url')->nullable();

            $table->string('teaser', 512)->nullable();
            $table->string('wikipedia', 512)->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('static_pages');
    }
};
