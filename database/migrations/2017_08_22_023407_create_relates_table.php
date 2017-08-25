<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('openid', 100)->unique();
            $table->dateTime('day')->comment('兑换金币时间');
            $table->string('nickname');
            $table->text('avatar');
            $table->integer('machine_id')->unsigned();

            $table->foreign('machine_id')->references('id')
                ->on('machines');
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
        Schema::dropIfExists('relates');
    }
}
