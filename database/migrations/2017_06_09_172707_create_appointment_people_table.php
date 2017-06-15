<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentPeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('appointment_people', function(Blueprint $table)
      {
        $table->integer('appointment_id')->unsigned()->nullable();
        $table->foreign('appointment_id')->references('id')
              ->on('appointments')->onDelete('cascade');

        $table->integer('person_id')->unsigned()->nullable();
        $table->foreign('person_id')->references('id')
              ->on('people')->onDelete('cascade');

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
      Schema::drop('appointment_people');
    }
}
