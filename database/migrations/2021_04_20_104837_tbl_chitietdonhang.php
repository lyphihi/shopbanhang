<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblChitietdonhang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_chitietdonhang', function (Blueprint $table) {
            $table->increments('ctdh_id');
            $table->integer('order_id');
            $table->integer('sp_id');
            $table->string('sp_ten');
            $table->float('sp_gia');
            $table->integer('sp_soluong');
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
        Schema::dropIfExists('tbl_chitietdonhang');
    }
}
