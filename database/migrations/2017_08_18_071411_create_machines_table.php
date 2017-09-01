<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMachinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('machines', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mac', 60)->unique();
            $table->Integer('num')->default(0)
                ->comment('今日步数');
            $table->Integer('total')->default(0)
                ->comment('总步数');
            $table->integer('exchange')->default(0)
                ->comment('已经兑换步数');
            $table->dateTime('date')->comment('步数的时间');
            $table->boolean('type')->default('0')
                ->comment('是否被关联');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('machines');
    }
}
