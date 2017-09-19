<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePvsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pvs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('indexPage');
            $table->integer('rewardPage');
            $table->integer('userPage');
            $table->integer('ticketPage');
            $table->integer('coinPage');
            $table->integer('dogPage');
            $table->integer('starPage');
            $table->integer('newPage');
            $table->integer('daySign');
            $table->dateTime('date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pvs');
    }
}
