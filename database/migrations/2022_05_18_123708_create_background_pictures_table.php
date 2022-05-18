<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('background_pictures', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('slug');

            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('background_pictures');
    }
};
