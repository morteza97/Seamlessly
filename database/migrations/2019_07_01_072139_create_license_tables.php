<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLicenseTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //مجوز تدریس دورس معارف اسلامی
        Schema::create('teaching_licenses', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelect('cascade');

            $table->unsignedinteger('lesson_id')->nullable();//نام درس
            $table->foreign('lesson_id')->references('id')->on('lessons')->onDelect('cascade');

            $table->text('license_number');
            $table->date('issue_date');

            $table->timestamps();
        });

        //مجوز تبلیغ در دانشگاه ها
        Schema::create('advertising_licenses', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelect('cascade');

            $table->text('file_number');
            $table->text('license_number');
            $table->date('issue_date');

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
        Schema::dropIfExists('teaching_licenses');
        Schema::dropIfExists('Advertising_licenses');
    }
}
