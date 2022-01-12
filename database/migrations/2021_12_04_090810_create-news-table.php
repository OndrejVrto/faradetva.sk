<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{

    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->boolean('active')->default(1);
            $table->foreignId('user_id')
                    ->nullable()
                    ->constrained()
                    ->onUpdate('CASCADE')
                    ->onDelete('SET NULL');
            $table->foreignId('category_id')
                    ->nullable()
                    ->constrained()
                    ->onUpdate('SET NULL')
                    ->onDelete('SET NULL');
            $table->mediumText('title');
            $table->string('slug')->unique();
            $table->binary('content');
            $table->timestamp('published_at')->nullable();
            $table->timestamp('unpublished_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->bigInteger('created_by')->unsigned();
            $table->bigInteger('updated_by')->unsigned();
        });
    }


    public function down()
    {
        Schema::dropIfExists('news');
    }
}
