<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class () extends Migration {
    public function up(): void {
        Schema::create('chart_data', function (Blueprint $table) {
            $table->id();

            $table->foreignId('chart_id')
                    ->constrained()
                    ->cascadeOnUpdate()
                    ->cascadeOnDelete();

            $table->string('key');
            $table->float('value', $precision = 8, $scale = 2);

            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('chart_data');
    }
};
