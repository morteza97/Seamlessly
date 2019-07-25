<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlumniBaseTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

       /*پایه تحصیلی حوزوی*/
        Schema::create('seminary_grades', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->text('title');
            $table->timestamps();
        });
        /*حوزه*/
        Schema::create('seminaries',function (Blueprint $table){
            $table->integerIncrements('id');
            $table->text('title');
            $table->longText('address');
            $table->text('phone');
            $table->timestamps();
        });

        /*مقطع تحصیلی یا مدارج علمی حوزوی*/
        Schema::create('seminary_academic_degrees',function (Blueprint $table){
            $table->tinyIncrements('id');
            $table->text('title');
            $table->timestamps();
        });

        /*رشته حوزوی*/
        Schema::create('seminary_field_of_studies',function (Blueprint $table){
            $table->integerIncrements('id');
            $table->text('title');
            $table->timestamps();
        });

        /*نوع مرکز آموزشی*/
        Schema::create('training_center_types',function (Blueprint $table){
            $table->smallIncrements('id');
            $table->text('title');
            $table->timestamps();
        });


        /*مرکز آموزشی و پژوهشی*/
        Schema::create('training_centers',function (Blueprint $table){
            $table->integerIncrements('id');

            $table->unsignedSmallInteger('training_center_type_id')->unsigned();
            $table->foreign('training_center_type_id')->references('id')->on('training_center_types')->onDelect('cascade');
            $table->text('title');

            $table->longText('address');
            $table->text('phone');
            $table->timestamps();
        });

        /*دانشگده*/
        /*Schema::create('colleges',function (Blueprint $table){
            $table->integerIncrements('id');
            $table->text('title');
            $table->text('phone');
            $table->unsignedInteger('university_id')->unsigned();
            $table->foreign('university_id')->references('id')->on('universities')->onDelect('cascade');
            $table->timestamps();
        });*/

        /*دروس*/
        Schema::create('lessons',function (Blueprint $table){
            $table->integerIncrements('id');
            $table->text('title');
            $table->timestamps();
        });
        /*کشور*/
        Schema::create('countries',function (Blueprint $table){
            $table->integerIncrements('id');
            $table->text('title');
            $table->timestamps();
        });
        /*استان*/
        Schema::create('provinces',function (Blueprint $table){
            $table->smallIncrements('id');
            $table->text('title');
            $table->unsignedInteger('country_id')->unsigned();
            $table->foreign('country_id')->references('id')->on('Countries')->onDelect('cascade');
            $table->timestamps();
        });
        /*شهر*/
        Schema::create('cities',function (Blueprint $table){
            $table->integerIncrements('id');
            $table->text('title');
            $table->unsignedSmallInteger('province_id')->unsigned();
            $table->foreign('province_id')->references('id')->on('provinces')->onDelect('cascade');
            $table->timestamps();
        });
        /*مقطع*/
        Schema::create('grades',function (Blueprint $table){
            $table->integerIncrements('id');
            $table->text('title');
            $table->timestamps();
        });

        /*رشته*/
        Schema::create('field_of_studies',function (Blueprint $table){
            $table->integerIncrements('id');
            $table->text('title');
            $table->timestamps();
        });

        /*گرایش*/
        Schema::create('orientations',function (Blueprint $table){
            $table->integerIncrements('id');
            $table->text('title');
            $table->unsignedinteger('field_of_study_id');
            $table->foreign('field_of_study_id')->references('id')->on('field_of_studies')->onDelect('cascade');
            $table->timestamps();
        });

        /*مذهب*/
        Schema::create('religions',function (Blueprint $table){
            $table->tinyIncrements('id');
            $table->text('title');
            $table->timestamps();
        });

        /*وضعیت تاهل*/
        Schema::create('marital_statuses',function (Blueprint $table){
            $table->tinyIncrements('id');
            $table->text('title');
            $table->timestamps();
        });

        /*وضعیت نظام وظیفه عمومی*/
        Schema::create('public_conscription_statuses',function (Blueprint $table){
            $table->tinyIncrements('id');
            $table->text('title');
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
        Schema::dropIfExists('seminary_grades');
        Schema::dropIfExists('seminaries');
        Schema::dropIfExists('seminary_academic_degrees');
        Schema::dropIfExists('training_center_types');
        Schema::dropIfExists('training_center');
        //Schema::dropIfExists('colleges');
        Schema::dropIfExists('lessons');
        Schema::dropIfExists('Countries');
        Schema::dropIfExists('provinces');
        Schema::dropIfExists('cities');
        Schema::dropIfExists('grades');
        Schema::dropIfExists('field_of_studies');
        Schema::dropIfExists('orientations');
        Schema::dropIfExists('religions');
        Schema::dropIfExists('marital_statuses');
        Schema::dropIfExists('public_conscription_statuses');

    }
}
