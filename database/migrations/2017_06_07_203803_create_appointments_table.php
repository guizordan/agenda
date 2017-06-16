<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('appointments', function (Blueprint $table) {
        $table->increments('id');
        $table->string('description');
        $table->string('time');
        $table->dateTime('date');
        $table->integer('place_id')->unsigned();
        $table->foreign('place_id')->references('id')->on('places');
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
      Schema::drop('appointments');
    }
}
