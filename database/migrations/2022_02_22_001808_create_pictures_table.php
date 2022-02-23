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

            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('slug');
            $table->string('author')->nullable();
            $table->string('author_url')->nullable();
            $table->string('source')->nullable();
            $table->string('source_url', 512)->nullable();
            $table->string('license')->nullable();
            $table->string('license_url')->nullable();

            $table->bigInteger('created_by')->unsigned()->nullable()->default(NULL);
            $table->bigInteger('updated_by')->unsigned()->nullable()->default(NULL);

            $table->timestamps();
            $table->softDeletes();
        });
    }


    public function down()
    {
        Schema::dropIfExists('pictures');
    }
};
