<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AbsensiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('absensi')->insert([
            [
                'karyawan_id' => 1,
                'tahun' => 2020,
                'bulan' => 1,
                'jumlah_hari_kerja' => 20,
                'jumlah_hari_sakit' => 0,
                'jumlah_hari_izin' => 0,
                'jumlah_hari_cuti' => 0,
                'jumlah_hari_alfa' => 0,
                'potongan_tunjangan_transport' => 0,
                'potongan_tunjangan_makan' => 0,
                'potongan_gaji_pokok' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'karyawan_id' => 1,
                'tahun' => 2020,
                'bulan' => 2,
                'jumlah_hari_kerja' => 20,
                'jumlah_hari_sakit' => 0,
                'jumlah_hari_izin' => 1,
                'jumlah_hari_cuti' => 0,
                'jumlah_hari_alfa' => 0,
                'potongan_tunjangan_transport' => 20000,
                'potongan_tunjangan_makan' => 25000,
                'potongan_gaji_pokok' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
        ]);
    }
}
