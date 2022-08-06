<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void {
        Schema::create('subscribers', function (Blueprint $table) {
            $table->uuid('uuid')->primary();

            $table->string('name');
            $table->string('email');
            $table->string('model_type');

            $table->timestamp('email_verified_at')->nullable();
            $table->string('verified_token');
            $table->string('unsubscribe_token');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void {
        Schema::dropIfExists('subscribers');
    }
};
