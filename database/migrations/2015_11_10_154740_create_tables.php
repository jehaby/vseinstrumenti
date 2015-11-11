<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('couriers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('surname');
            $table->string('last_name');
        });

        Schema::create('regions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->unsignedSmallInteger('time_to');
            $table->unsignedSmallInteger('time_back');
        });

        Schema::create('trips', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('courier_id');
            $table->unsignedInteger('region_id');
            $table->foreign('courier_id')->references('id')->on('couriers');
            $table->foreign('region_id')->references('id')->on('regions');
            $table->date('departure_date');  // Departure from Moscow
            $table->date('arrival_date');
            $table->date('return_date');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('trips');
        Schema::drop('couriers');
        Schema::drop('regions');
    }
}
