<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmploymentRecordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employment_records', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelect('cascade');

            $table->text('workplace_name');//نام محل کار

            //$table->unsignedinteger('organizational_unit');//واحد سازمانی

            $table->unsignedSmallInteger('responsibility_type_id')->unsigned()->nullable();//نوع مسئولیت
            $table->foreign('responsibility_type_id')->references('id')->on('responsibility_types')->onDelect('cascade');

            $table->unsignedInteger('city_id')->unsigned()->nullable();//شهرستان
            $table->foreign('city_id')->references('id')->on('cities')->onDelect('cascade');

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
        Schema::dropIfExists('employment_records');
    }
}
