<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void {
        Schema::create('logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->dateTime('log_date');
            $table->string('table_name', 50)->nullable();
            $table->string('log_type', 50);
            $table->longText('data');
        });
    }

    public function down(): void {
        Schema::dropIfExists('logs');
    }
};
