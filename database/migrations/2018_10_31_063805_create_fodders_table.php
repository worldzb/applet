<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoddersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fodders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('f_hash')->comment('哈希值');//通过哈希值与地址拼合可得到文件的详细地址
            $table->string('f_key')->comment('key值');
            $table->string('f_type')->comment('类别');
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
        Schema::dropIfExists('fodders');
    }
}
