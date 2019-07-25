<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScientificreferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scientific_references', function (Blueprint $table) {
            $table->bigIncrements('id');
			
			$table->unsignedBigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelect('cascade');
            
			$table->text('first_name');
            $table->text('last_name');
            $table->text('relation_type');
            $table->text('acquaintance_method');
            $table->text('acquaintance_time');
            $table->text('reference_job');
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
        Schema::dropIfExists('scientific_references');
    }
}
