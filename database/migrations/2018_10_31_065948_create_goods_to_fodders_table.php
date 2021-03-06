<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsToFoddersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods_to_fodders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type')->comment('类型');
            $table->integer('goods_id')->comment('商品id');
            $table->integer('fodders_id')->comment('图片id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('goods_to_fodders');
    }
}
