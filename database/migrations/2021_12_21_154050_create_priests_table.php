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
            $table->string('slug')->unique();
            $table->string('phone')->nullable();
            $table->string('function')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->bigInteger('created_by')->unsigned();
            $table->bigInteger('updated_by')->unsigned();
        });
    }


    public function down()
    {
        Schema::dropIfExists('priests');
    }
};
