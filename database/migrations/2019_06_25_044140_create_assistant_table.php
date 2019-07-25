<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssistantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assistants', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->string('title');
            $table->timestamps();
        });

        Schema::create('scientific_groups', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->string('title');
            $table->string('url')->nullable();
            $table->unsignedTinyInteger('assistant_id')->nullable();
            $table->foreign('assistant_id')->references('id')->on('assistants')->onDelect('set null');
            $table->timestamps();
        });

        Schema::create('scientific_levels', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->string('title');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assistant');
    }
}
