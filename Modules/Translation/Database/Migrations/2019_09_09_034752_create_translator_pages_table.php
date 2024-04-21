<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTranslatorPagesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('translator_pages', function (Blueprint $table) {
            $table->increments('id')->length(11);
            $table->datetime('created_at')->nullable();
            $table->datetime('updated_at')->nullable();
            $table->datetime('deleted_at')->nullable();
            $table->string('name')->index('name');
            $table->string('name_translation')->index('name_translation')->nullable();
            $table->string('route_name')->nullable();
            $table->unsignedInteger('translator_group_id')->index('translator_group_id')->nullable();

            $table->foreign('translator_group_id')
                ->references('id')
                ->on('translator_groups')
            ;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('translator_pages');
    }
}
