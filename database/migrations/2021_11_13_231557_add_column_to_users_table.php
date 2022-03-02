<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('nick')->unique()->after('name');
            $table->string('slug')->after('nick');
            $table->boolean('can_be_impersonated')->after('email')->default(1);
            $table->boolean('active')->after('id')->default(1);
        });
    }


    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('nick');
            $table->dropColumn('slug');
            $table->dropColumn('can_be_impersonated');
            $table->dropColumn('active');
        });
    }
};
