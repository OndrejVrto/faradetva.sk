<?php declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void {
        Schema::create('static_page_banner', function (Blueprint $table) {
            // $table->id();
            $table->foreignId('static_page_id')
                ->constrained()
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
            $table->foreignId('banner_id')
                ->constrained()
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
            $table->primary(['static_page_id', 'banner_id'], 'static_page_banner_id');
        });
    }

    public function down(): void {
        Schema::dropIfExists('static_page_banner');
    }
};
