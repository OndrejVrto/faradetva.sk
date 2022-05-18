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

            $table->string('source_description', 420)->nullable();
            $table->string('source_source')->nullable();
            $table->string('source_source_url', 512)->nullable();
            $table->string('source_author')->nullable();
            $table->string('source_author_url', 512)->nullable();
            $table->string('source_license')->nullable();
            $table->string('source_license_url', 512)->nullable();

            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('source');
    }
};
