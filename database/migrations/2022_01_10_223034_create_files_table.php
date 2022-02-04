<?php

declare(strict_types = 1);

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void {
        Schema::create('files', function (Blueprint $table) {
            $table->id();

            $table->foreignId('static_page_id')
                    ->nullable()
                    ->constrained()
                    ->onUpdate('CASCADE')
                    ->onDelete('CASCADE');
            $table->foreignId('file_type_id')
                    ->nullable()
                    ->constrained()
                    ->onUpdate('SET NULL')
                    ->onDelete('SET NULL');

            $table->string('name');
            $table->string('description')->nullable();
            $table->string('slug');
            $table->string('author')->nullable();
            $table->string('author_url')->nullable();
            $table->string('source')->nullable();
            $table->string('source_url', 512)->nullable();
            $table->string('license')->nullable();
            $table->string('license_url')->nullable();

            $table->bigInteger('created_by')->unsigned()->nullable()->default(NULL);
            $table->bigInteger('updated_by')->unsigned()->nullable()->default(NULL);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void {
        Schema::dropIfExists('files');
    }
};
