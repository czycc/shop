<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shop_user_id')->unsigned();
            $table->string('location');
            $table->string('mobile', 11);
            $table->string('reward');
            $table->enum('status', ['取消', '待确认', '已确认', '待发货', '已发货', '已收货', '完成']);
            $table->string('code', 50)->default('')
                ->comment('物流单号');
            $table->text('comment')->default('');
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
        Schema::dropIfExists('orders');
    }
}
