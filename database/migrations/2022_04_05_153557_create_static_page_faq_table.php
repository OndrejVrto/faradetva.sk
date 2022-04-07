<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('static_page_faq', function (Blueprint $table) {
            $table->foreignId('static_page_id')
                ->constrained()
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
            $table->foreignId('faq_id')
                ->constrained('faqs')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
            $table->primary(['static_page_id', 'faq_id'], 'static_page_faq_id');
        });
    }


    public function down()
    {
        Schema::dropIfExists('static_page_faq');
    }
};
