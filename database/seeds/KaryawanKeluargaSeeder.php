<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KaryawanKeluargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('karyawan_keluarga')->insert([
            [
                'karyawan_id' => 1,
                'hubungan' => 'Ayah',
                'nama' => 'Bambang',
                'tgl_lahir' => Carbon::now()->format('Y-m-d'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'karyawan_id' => 1,
                'hubungan' => 'Ibu',
                'nama' => 'Nani',
                'tgl_lahir' => Carbon::now()->format('Y-m-d'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ]);
    }
}
