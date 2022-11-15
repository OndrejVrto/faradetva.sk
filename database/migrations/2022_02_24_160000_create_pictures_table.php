<?php declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void {
        Schema::create('pictures', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('slug');

            $table->boolean('crop_output_exact_dimensions')->default(0);
            $table->smallInteger('crop_output_width')->unsigned()->nullable();
            $table->smallInteger('crop_output_height')->unsigned()->nullable();

            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('pictures');
    }
};
