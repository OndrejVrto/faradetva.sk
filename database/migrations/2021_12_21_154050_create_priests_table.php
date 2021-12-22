<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePriestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('priests', function (Blueprint $table) {
            $table->id();
            $table->boolean('active')->default(1);
			$table->string('titles_before')->nullable();
			$table->string('first_name');
			$table->string('last_name');
			$table->string('titles_after')->nullable();
			$table->string('slug');
			$table->string('function')->nullable();
			$table->text('description')->nullable();
			// $table->json('working_history')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('priests');
    }
}
