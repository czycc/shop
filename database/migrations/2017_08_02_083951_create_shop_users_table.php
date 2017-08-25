<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('openid', 100)->unique();
            $table->string('name');
            $table->string('mobile', 11);
            $table->date('birthday');
            $table->text('location');
            $table->mediumInteger('coin')->default(0)
                ->comment('持有金币数量');
            $table->dateTime('sign')->comment('签到时间');
            $table->tinyInteger('num')
                ->default(0)
                ->comment('抽奖次数');
            $table->boolean('type')->default('0')
                ->comment('是否完善信息');
            $table->timestamps();
        });
    }

    /**n
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_users');
    }
}
