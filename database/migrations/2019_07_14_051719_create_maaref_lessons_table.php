<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaarefLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maaref_lessons',function (Blueprint $table){
            $table->integerIncrements('id');
            $table->string('title');
            $table->integer('lesson_number')->unique();
            $table->tinyInteger('unit');
            $table->tinyInteger('active');
            $table->unsignedInteger('grade_id');
            $table->unsignedTinyInteger('lesson_type_id');
            $table->unsignedTinyInteger('lesson_method_id');
            $table->unsignedTinyInteger('lesson_gender_id');
            $table->unsignedTinyInteger('scientific_groups_id');
            $table->foreign('grade_id')->references('id')->on('grades')->onDelect('cascade');
            $table->foreign('lesson_type_id')->references('id')->on('lesson_types')->onDelect('cascade');
            $table->foreign('lesson_gender_id')->references('id')->on('lesson_genders')->onDelect('cascade');
            $table->foreign('lesson_method_id')->references('id')->on('lesson_methods')->onDelect('cascade');
            $table->foreign('scientific_groups_id')->references('id')->on('scientific_groups')->onDelect('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('maaref_lessons');
    }
}
