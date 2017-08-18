<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopUserTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_user_tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shop_user_id')->unsigned();
            $table->integer('ticket_id')->unsigned();

            $table->foreign('shop_user_id')->references('id')
                ->on('shop_users');
            $table->foreign('ticket_id')->references('id')
                ->on('tickets');
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
        Schema::dropIfExists('shop_user_tickets');
    }
}
