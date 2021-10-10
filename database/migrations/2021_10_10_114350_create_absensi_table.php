<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsensiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absensi', function (Blueprint $table) {
            $table->bigIncrements('id', 20);
            $table->unsignedBigInteger('karyawan_id', false)->length(20);
            $table->foreign('karyawan_id')->references('id')->on('karyawan');
            $table->integer('tahun', false, false)->length(4);
            $table->integer('bulan', false, false)->length(2);
            $table->integer('jumlah_hari_kerja', false, false);
            $table->integer('jumlah_hari_sakit', false, false);
            $table->integer('jumlah_hari_izin', false, false);
            $table->integer('jumlah_hari_cuti', false, false);
            $table->integer('jumlah_hari_alfa', false, false);
            $table->integer('potongan_tunjangan_transport', false, false);
            $table->integer('potongan_tunjangan_makan', false, false);
            $table->integer('potongan_gaji_pokok', false, false);
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
        Schema::dropIfExists('absensi');
    }
}
