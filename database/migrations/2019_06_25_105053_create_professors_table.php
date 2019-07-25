<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfessorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('ProfessorNumber')->unique();
            $table->string('nickname')->nullable();
            $table->unsignedTinyInteger('group_id');
            $table->unsignedTinyInteger('level_id');
            $table->string('resume_file')->nullable();
            $table->tinyInteger('active')->default('1');
            $table->unsignedBigInteger('user_id');
            $table->foreign('group_id')->references('id')->on('scientific_groups')->onDelect('cascade');
            $table->foreign('level_id')->references('id')->on('scientific_levels')->onDelect('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelect('cascade');
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
        Schema::dropIfExists('professors');
    }
}
