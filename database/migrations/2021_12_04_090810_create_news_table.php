<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                    ->nullable()
                    ->constrained()
                    ->onUpdate('NO ACTION')
                    ->onDelete('NO ACTION');
                    // ->onUpdate('CASCADE')
                    // ->onDelete('SET NULL');
            $table->foreignId('category_id')
                    ->nullable()
                    ->constrained()
                    // ->onUpdate('NO ACTION')
                    // ->onDelete('NO ACTION');
                    ->onUpdate('SET NULL')
                    ->onDelete('SET NULL');
            $table->fulltext(['title', 'teaser', 'content_plain']);

            $table->boolean('active')->default(1);
            $table->timestamp('published_at')->nullable()->default(NULL);
            $table->timestamp('unpublished_at')->nullable()->default(NULL);
            $table->boolean('notified')->default(0);
            $table->string('title', 200);
            $table->string('slug', 200);
            $table->string('teaser', 500);
            $table->mediumtext('content')->nullable();
            $table->mediumtext('content_plain')->nullable();
            $table->smallinteger('count_words')->unsigned()->default(0)->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }


    public function down()
    {
        Schema::dropIfExists('news');
    }
};
