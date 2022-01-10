<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToUsersTable extends Migration
{

    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('nick')->unique()->after('name');
        });
    }


    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('nick');
        });
    }
}