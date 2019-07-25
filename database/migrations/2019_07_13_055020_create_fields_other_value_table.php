<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFieldsOtherValueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fields_other_values', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->text('table_name');//نام جدول
            $table->text('table_title');//عنوان جدول
            $table->text('field_name');//نام فیلد
            $table->text('field_title');//عنوان فیلد
            $table->unsignedBigInteger('record_id');//مقدار رکورد کلید اصلی
            $table->text('new_value');//مقدار فیلد
            $table->boolean('applied');//در جدول اعمال شده یا نه

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
        Schema::dropIfExists('fields_other_values');
    }
}
