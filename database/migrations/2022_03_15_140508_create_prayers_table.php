<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('prayers', function (Blueprint $table) {
            $table->id();

            $table->boolean('active')->default(1);
            $table->string('title');
            $table->string('slug');
            $table->string('quote_row1');
            $table->string('quote_row2')->nullable();
            $table->string('quote_author')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }


    public function down()
    {
        Schema::dropIfExists('prayers');
    }
};
