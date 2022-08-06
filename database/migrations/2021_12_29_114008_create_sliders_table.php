<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void {
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();

            $table->boolean('active')->default(1);
            $table->string('heading_1')->nullable();
            $table->string('heading_2')->nullable();
            $table->string('heading_3')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void {
        Schema::dropIfExists('sliders');
    }
};
