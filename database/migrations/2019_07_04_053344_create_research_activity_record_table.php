<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResearchActivityRecordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('research_activity_records', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelect('cascade');

            $table->unsignedInteger('training_center_id')->unsigned()->nullable();
            $table->foreign('training_center_id')->references('id')->on('training_centers')->onDelect('cascade');

            $table->text('researches_title');

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
        Schema::dropIfExists('research_activity_records');
    }
}
