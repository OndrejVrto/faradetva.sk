<?php declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void {
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

    public function down(): void {
        Schema::dropIfExists('news_tags');
    }
};
