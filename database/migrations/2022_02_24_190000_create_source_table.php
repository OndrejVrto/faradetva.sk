<?php

declare(strict_types = 1);

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void {
        Schema::create('source', function (Blueprint $table) {
            $table->id();

            $table->morphs('sourceable');

            $table->string('description')->nullable();
            $table->string('author')->nullable();
            $table->string('author_url', 512)->nullable();
            $table->string('source')->nullable();
            $table->string('source_url', 512)->nullable();
            $table->string('license')->nullable();
            $table->string('license_url', 512)->nullable();

            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('source');
    }
};
