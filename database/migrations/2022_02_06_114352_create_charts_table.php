<?php

declare(strict_types = 1);

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void {
        Schema::create('charts', function (Blueprint $table) {
            $table->id();

            $table->boolean('active')->default(1);
            $table->string('title');
            $table->string('description')->nullable();
            $table->string('slug');
            $table->string('name_x_axis');
            $table->string('name_y_axis');
            $table->tinyInteger('type_chart')->unsigned();
            $table->string('color', 10);

            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('charts');
    }
};
