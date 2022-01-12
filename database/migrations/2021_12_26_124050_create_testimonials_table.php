<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestimonialsTable extends Migration
{

    public function up()
    {
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->boolean('active')->default(1);
            $table->string('name');
            $table->string('slug')->unique();
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
        Schema::dropIfExists('testimonials');
    }
}
