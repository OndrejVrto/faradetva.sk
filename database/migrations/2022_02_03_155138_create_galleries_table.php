<?php

declare(strict_types = 1);

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void {
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('description')->nullable();
            $table->string('slug');
            $table->string('author')->nullable()->default('null');
            $table->string('author_url', 512)->nullable()->default('null');
            $table->string('source')->nullable()->default('null');
            $table->string('source_url', 512)->nullable()->default('null');
            $table->string('license')->nullable()->default('null');
            $table->string('license_url', 512)->nullable()->default('null');

            $table->timestamps();
            $table->softDeletes();
            $table->bigInteger('created_by')->unsigned();
            $table->bigInteger('updated_by')->unsigned();
        });
    }

    public function down(): void {
        Schema::dropIfExists('galleries');
    }
};
