<?php

declare(strict_types = 1);

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void {
        Schema::create('day_ideas', function (Blueprint $table) {
            $table->id();

            $table->string('idea', 4096);
            $table->string('author')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('day_ideas');
    }
};
