<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEducationalExperienceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //سوابق آموزشی
        Schema::create('educational_experiences', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelect('cascade');

            $table->unsignedInteger('training_center_id')->unsigned()->nullable();
            $table->foreign('training_center_id')->references('id')->on('training_centers')->onDelect('cascade');

            $table->text('lessons_title');

            $table->unsignedinteger('grade_id');//مقطع تحصیلی
            $table->foreign('grade_id')->references('id')->on('grades')->onDelect('cascade');

            $table->date('start_date');
            $table->date('end_date');

            $table->text('address');
            $table->text('phone');

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
        Schema::dropIfExists('educational_experiences');
    }
}
