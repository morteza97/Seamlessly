<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfessorEducationHistoriesTable extends Migration
{
    public function up()
    {
        Schema::create('professor_education_histories', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->string('title');
            $table->string('detail')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelect('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('professor_education_histories');
    }
}
