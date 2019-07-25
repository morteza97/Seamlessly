<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('objectguid')->nullable();
            $table->string('FirstName')->nullable();
            $table->string('LastName')->nullable();
            $table->string('NationalCode')->nullable();
            $table->string('IdentityNumber')->nullable();
            $table->string('IdentityPlace')->nullable();
            $table->string('FatherName')->nullable();
            $table->date('BirthDate')->nullable();
            $table->string('BirthPlace')->nullable();
            $table->string('phone')->nullable();
            $table->string('work_phone')->nullable();
            $table->string('address')->nullable();
            $table->string('work_address')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('work_zip_code')->nullable();
            $table->string('mobile')->nullable();
            $table->string('pic')->nullable();
            $table->string('code')->nullable();
            $table->boolean('active')->default('0');
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->string('password');
            $table->unsignedTinyInteger('gender_id')->default(1);
            $table->unsignedTinyInteger('marital_status_id')->default(1);
            $table->unsignedTinyInteger('public_conscription_status_id')->default(1);
            $table->foreign('gender_id')->references('id')->on('genders')->onDelect('cascade');
            $table->foreign('marital_status_id')->references('id')->on('marital_statuses')->onDelect('cascade');
            $table->foreign('public_conscription_status_id')->references('id')->on('public_conscription_statuses')->onDelect('cascade');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
