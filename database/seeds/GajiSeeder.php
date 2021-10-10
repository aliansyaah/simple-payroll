<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GajiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('gaji')->insert([
            [
                'karyawan_id' => 1,
                'absensi_id' => 1,
                'tanggal' => '2021-01-25',
                'gaji_pokok' => 5000000,
                'tunjangan_jabatan' => 300000,
                'tunjangan_makan' => 25000,
                'tunjangan_transport' => 20000,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
        ]);
    }
}
