<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTranslatorTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('translator_translations', function (Blueprint $table) {
            $table->id();
            $table->datetime('created_at')->nullable();
            $table->datetime('updated_at')->nullable();
            $table->unsignedInteger('translator_language_id');
            $table->unsignedInteger('translator_page_id')->index()->nullable();
            $table->string('key');
            $table->text('value');

            $table->unique(['translator_language_id', 'translator_page_id', 'key'], 'translator_translations_key_unique');
            $table->index(['translator_language_id', 'translator_page_id', 'key'], 'translator_translations_search_index');

            $table->foreign('translator_language_id')
                ->references('id')
                ->on('translator_languages')
            ;

            $table->foreign('translator_page_id')
                ->references('id')
                ->on('translator_pages')
            ;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('translator_translations');
    }
}
