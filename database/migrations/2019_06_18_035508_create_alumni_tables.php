<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlumniTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*انجمن دانش آموختگان*/
        Schema::create('alumni_associations',function (Blueprint $table){
            $table->bigIncrements('id');
            $table->text('father_name');
            $table->text('birth_certificate_number');//شماره شناسنامه
            $table->text('birth_place');
            $table->text('issue_place');//محل صدور

            $table->unsignedTinyInteger('religion_id');//مذهب
            $table->foreign('religion_id')->references('id')->on('religions')->onDelect('cascade');

            $table->unsignedinteger('country_id');//تابعیت
            $table->foreign('country_id')->references('id')->on('countries')->onDelect('cascade');

            $table->unsignedTinyInteger('marital_status_id');// وضعیت تاهل
            $table->foreign('marital_status_id')->references('id')->on('marital_statuses')->onDelect('cascade');

            $table->text('home_phone');//تلفن منزل

            /*            $table->unsignedSmallInteger('province_id')->unsigned();
                        $table->foreign('province_id')->references('id')->on('provinces')->onDelect('cascade');*/

            $table->unsignedInteger('city_id')->unsigned()->nullable();
            $table->foreign('city_id')->references('id')->on('cities')->onDelect('cascade');

            $table->text('home_Address');
            $table->text('work_place_phone');//تلفن محل کار
            $table->text('required_phone');//تلفن اضطراری

            $table->unsignedTinyInteger('public_conscription_status_id')->unsigned();//وضعیت نظام وظیفه
            $table->foreign('public_conscription_status_id')->references('id')->on('public_conscription_statuses')->onDelect('cascade');

            $table->date('conscription_end_date')->nullable();//تاریخ پایان خدمت

            $table->unsignedTinyInteger("seminary_grade_id")->nullable();//آخرین پایه تحصیلی حوزوی
            $table->foreign('seminary_grade_id')->references('id')->on('seminary_grades')->onDelect('cascade');

            $table->unsignedBigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelect('cascade');
            $table->timestamps();
        });

        /*سوابق مدارج علمی حوزوی*/
        Schema::create('seminary_academic_degree_histories',function (Blueprint $table){
            $table->bigIncrements('id');

            $table->unsignedBigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelect('cascade');

            $table->unsignedTinyInteger('seminary_academic_degree_id');//مقطع تحصیلی یا مدارج علمی حوزوی
            $table->foreign('seminary_academic_degree_id','sad_id')->references('id')->on('seminary_academic_degrees')->onDelect('cascade');

            $table->unsignedinteger('seminary_field_of_study_id')->nullable();//رشته حوزوی
            $table->foreign('seminary_field_of_study_id','sfos_id')->references('id')->on('seminary_field_of_studies')->onDelect('cascade');

            $table->unsignedInteger('training_center_id')->unsigned()->nullable();//حوزه
            $table->foreign('training_center_id')->references('id')->on('training_centers')->onDelect('cascade');

            $table->float('average');//معدل
            $table->date('start_date');//تاریخ شروع
            $table->date('end_date');//تاریخ پایان
            $table->boolean('official_document');//مدرک رسمی
            $table->timestamps();
        });

        /*سوابق تحصیلات دانشگاهی*/
        Schema::create('college_education_histories',function (Blueprint $table){
            $table->bigIncrements('id');

            $table->unsignedBigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelect('cascade');

            $table->unsignedinteger('grade_id');//مقطع تحصیلی
            $table->foreign('grade_id')->references('id')->on('grades')->onDelect('cascade');

            $table->unsignedinteger('field_of_study_id')->nullable();//رشته
            $table->foreign('field_of_study_id')->references('id')->on('field_of_studies')->onDelect('cascade');

            $table->unsignedinteger('orientation_id')->nullable();//گرایش
            $table->foreign('orientation_id')->references('id')->on('orientations')->onDelect('cascade');

            $table->float('average');//معدل

            $table->unsignedInteger('training_center_id')->unsigned()->nullable();//دانشگاه محل تحصیل
            $table->foreign('training_center_id')->references('id')->on('training_centers')->onDelect('cascade');

            $table->unsignedinteger('country_id')->nullable();//کشور محل تحصیل
            $table->foreign('country_id')->references('id')->on('countries')->onDelect('cascade');
            $table->date('start_date');
            $table->date('end_date');
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
        Schema::dropIfExists('alumni_associations');
        Schema::dropIfExists('seminary_academic_degree_histories');
        Schema::dropIfExists('college_education_histories');
    }
}
