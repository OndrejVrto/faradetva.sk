<?php declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('active')->after('id')->default(1);
            $table->after('name', function ($table) {
                $table->string('nick')->unique();
                $table->string('slug');
            });
            $table->after('email', function ($table) {
                $table->string('www_page_url', 512)->nullable();
                $table->string('twitter_url', 512)->nullable();
                $table->string('facebook_url', 512)->nullable();
                $table->string('phone')->nullable();
                $table->boolean('can_be_impersonated')->default(1);
            });
        });
    }

    public function down(): void {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'nick',
                'slug',
                'phone',
                'active',
                'twitter_url',
                'facebook_url',
                'www_page_url',
                'can_be_impersonated',
            ]);
        });
    }
};
