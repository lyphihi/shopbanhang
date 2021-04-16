<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblHoadon extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_hoadon', function (Blueprint $table) {
            $table->increments('hd_id');
            $table->string('hd_ten');
            $table->integer('kh_id');
            $table->string('hd_diachi');
            $table->string('hd_sdt');
            $table->string('hd_email');
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
        Schema::dropIfExists('tbl_hoadon');
    }
}
