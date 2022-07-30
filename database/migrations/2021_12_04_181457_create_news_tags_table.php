<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up() {
        Schema::create('news_tag', function (Blueprint $table) {
            // $table->id();
            $table->foreignId('news_id')
                ->constrained()
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
            $table->foreignId('tag_id')
                ->constrained()
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
            $table->primary(['news_id', 'tag_id'], 'news_tag_id');
        });
    }


    public function down() {
        Schema::dropIfExists('news_tags');
    }
};
