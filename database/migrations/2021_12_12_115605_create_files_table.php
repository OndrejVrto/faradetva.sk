<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->morphs('fileable');
            $table->string('name');
            $table->string('filename');
            $table->string('description')->nullable()->default(null);
            $table->string('path', 512);
            $table->string('mime');
            $table->string('ext', 16);
            $table->integer('size_file')->unsigned();
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
        Schema::dropIfExists('files');
    }
}
