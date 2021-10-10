<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJabatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jabatan', function (Blueprint $table) {
            // $table->id();
            $table->bigIncrements('id', 20);
            $table->string('nama_jabatan', 20);
            $table->integer('gaji_pokok', false, false);
            $table->integer('tunjangan_jabatan', false, false);
            $table->integer('tunjangan_makan_perhari', false, false);
            $table->integer('tunjangan_transport_perhari', false, false);
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
        Schema::dropIfExists('jabatan');
    }
}
