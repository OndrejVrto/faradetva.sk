<?php declare(strict_types=1);

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class () extends Migration {
    public function up(): void {
        Schema::create('faqs', function (Blueprint $table) {
            $table->id();

            $table->string('question');
            $table->string('slug');
            $table->text('answer');
            $table->tinyInteger('order')->nullable()->default(1);

            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('faqs');
    }
};
