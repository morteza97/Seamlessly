<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('StudentNumber');
            $table->unsignedBigInteger('user_id');
            $table->unsignedinteger('grade_id');//مقطع تحصیلی
            $table->unsignedinteger('field_of_study_id');//رشته
            $table->unsignedinteger('orientation_id');//گرایش

            $table->foreign('grade_id')->references('id')->on('grades')->onDelect('cascade');
            $table->foreign('field_of_study_id')->references('id')->on('field_of_studies')->onDelect('cascade');
            $table->foreign('orientation_id')->references('id')->on('orientations')->onDelect('cascade');
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
        Schema::dropIfExists('students');
    }
}
