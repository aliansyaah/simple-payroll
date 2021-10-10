<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKaryawanKeluargaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karyawan_keluarga', function (Blueprint $table) {
            $table->unsignedBigInteger('karyawan_id', 20);
            $table->foreign('karyawan_id')->references('id')->on('karyawan');
            $table->string('hubungan', 30);
            $table->string('nama', 40);
            $table->date('tgl_lahir');
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
        Schema::dropIfExists('karyawan_keluarga');
    }
}
