<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();

            $table->boolean('active')->default(1);
            $table->string('name');
            $table->string('slug');
            $table->string('function')->nullable();
            $table->string('url', 512)->nullable();
            $table->text('description')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }


    public function down()
    {
        Schema::dropIfExists('testimonials');
    }
};
