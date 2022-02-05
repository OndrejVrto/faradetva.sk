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
            $table->string('author')->nullable()->default(NULL);
            $table->string('author_url', 512)->nullable()->default(NULL);
            $table->string('source')->nullable()->default(NULL);
            $table->string('source_url', 512)->nullable()->default(NULL);
            $table->string('license')->nullable()->default(NULL);
            $table->string('license_url', 512)->nullable()->default(NULL);

            $table->bigInteger('created_by')->unsigned()->nullable()->default(NULL);
            $table->bigInteger('updated_by')->unsigned()->nullable()->default(NULL);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void {
        Schema::dropIfExists('galleries');
    }
};
