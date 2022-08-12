<?php declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void {
        Schema::table('users', function (Blueprint $table) {
            $table->string('nick')->unique()->after('name');
            $table->string('slug')->after('nick');
            $table->boolean('can_be_impersonated')->after('email')->default(1);
            $table->boolean('active')->after('id')->default(1);
            $table->string('phone')->nullable()->after('email');
            $table->string('facebook_url', 512)->nullable()->after('email');
            $table->string('twitter_url', 512)->nullable()->after('email');
            $table->string('www_page_url', 512)->nullable()->after('email');
        });
    }

    public function down(): void {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('nick');
            $table->dropColumn('slug');
            $table->dropColumn('can_be_impersonated');
            $table->dropColumn('active');
            $table->dropColumn('phone');
            $table->dropColumn('facebook_url');
            $table->dropColumn('twitter_url');
            $table->dropColumn('www_page_url');
        });
    }
};
