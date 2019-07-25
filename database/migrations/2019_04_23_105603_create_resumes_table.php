<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResumesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resumes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('title');
            $table->longText('resource')->nullable();
            $table->string('year',4)->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('activity_type_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelect('cascade');
            $table->foreign('activity_type_id')->references('id')->on('activity_types')->onDelect('cascade');
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
        Schema::dropIfExists('resumes');
    }
}
