<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('pictures', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('slug');

            $table->boolean('crop_exact_dimensions')->default(0);
            $table->smallInteger('crop_width')->unsigned()->nullable();
            $table->smallInteger('crop_height')->unsigned()->nullable();

            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('pictures');
    }
};
