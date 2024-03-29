<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('karyawan')->insert([
            [
                'nama_karyawan' => 'Ali',
                'tanggal_masuk' => Carbon::now()->format('Y-m-d'),
                'jabatan_id' => 1,
                'divisi_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'nama_karyawan' => 'Tito',
                'tanggal_masuk' => Carbon::now()->subYear(),
                'jabatan_id' => 1,
                'divisi_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'nama_karyawan' => 'Tiara',
                'tanggal_masuk' => Carbon::now()->subYears(3),
                'jabatan_id' => 1,
                'divisi_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'nama_karyawan' => 'Vanessa',
                'tanggal_masuk' => Carbon::now()->subYears(4),
                'jabatan_id' => 1,
                'divisi_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ]);
    }
}
