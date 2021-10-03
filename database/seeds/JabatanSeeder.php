<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jabatan')->insert([
            [
                'nama_jabatan' => 'Staff IT',
                'gaji_pokok' => '5000000',
                'tunjangan_jabatan' =>'300000',
                'tunjangan_makan_perhari' => '25000',
                'tunjangan_transport_perhari' => '20000',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'nama_jabatan' => 'Staff Finance',
                'gaji_pokok' => '4500000',
                'tunjangan_jabatan' =>'300000',
                'tunjangan_makan_perhari' => '25000',
                'tunjangan_transport_perhari' => '20000',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'nama_jabatan' => 'Staff HRD',
                'gaji_pokok' => '4500000',
                'tunjangan_jabatan' =>'300000',
                'tunjangan_makan_perhari' => '25000',
                'tunjangan_transport_perhari' => '20000',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ]);
    }
}
