<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfessorTermLessonsTable extends Migration
{

    public function up()
    {
        Schema::create('professor_term_lessons', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->unsignedTinyInteger('term_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedInteger('lesson_id');
            $table->tinyInteger('students_number')->nullable();
            $table->tinyInteger('lesson_group')->nullable();
            $table->string('period')->nullable();
            $table->string('day')->nullable();
            $table->string('time')->nullable();
            $table->date('test_date')->nullable();
            $table->string('test_time')->nullable();
            $table->string('detail')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelect('cascade');
            $table->foreign('lesson_id')->references('id')->on('maaref_lessons')->onDelect('cascade');
            $table->foreign('term_id')->references('id')->on('terms')->onDelect('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('professor_term_lessons');
    }
}
