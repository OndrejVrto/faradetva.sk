<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
			$table->foreignId('user_id')
					->nullable()
					->constrained()
					->onUpdate('CASCADE')
					->onDelete('SET NULL');
			$table->foreignId('category_id')
					->nullable()
					->constrained()
					->onUpdate('SET NULL')
					->onDelete('SET NULL');
			$table->mediumText('title');
			$table->mediumText('slug');
			$table->binary('content');
            $table->timestamp('created_at')->useCurrent();
			$table->timestamp('updated_at')->useCurrent();
			$table->softDeletes();
			$table->bigInteger('created_by')->unsigned();
            $table->bigInteger('updated_by')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
