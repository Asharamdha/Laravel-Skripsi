<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableWaktuBaku extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('waktu_baku', function (Blueprint $table) {
            $table->increments('id');
            $table->date('tanggal');
            $table->string('bulan');
            $table->string('tahun');
            $table->float('m1');
            $table->float('m2');
            $table->float('m3');
            $table->float('m4');
            $table->float('m5');
            $table->float('m1_waktu_proses');
            $table->float('m2_waktu_proses');
            $table->float('m3_waktu_proses');
            $table->float('m4_waktu_proses');
            $table->float('m5_waktu_proses');
            $table->string('pelanggan');
            $table->integer('kuantitas');
            $table->nullableTimestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('waktu_baku');

    }
}
