<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menu')->insert([
            [
                'nama_menu' => 'Master Data',
                'level_menu' => 'main_menu',
                'master_menu' => 0,
                'url' => 'master-data',
                'aktif' => 'Y',
                'no_urut' => 1
            ],
            [
                'nama_menu' => 'Divisi',
                'level_menu' => 'sub_menu',
                'master_menu' => 1,
                'url' => 'master-data/divisi',
                'aktif' => 'Y',
                'no_urut' => 2
            ],
            [
                'nama_menu' => 'Jabatan',
                'level_menu' => 'sub_menu',
                'master_menu' => 1,
                'url' => 'master-data/jabatan',
                'aktif' => 'Y',
                'no_urut' => 3
            ],
            [
                'nama_menu' => 'Konfigurasi',
                'level_menu' => 'main_menu',
                'master_menu' => 0,
                'url' => 'konfigurasi',
                'aktif' => 'Y',
                'no_urut' => 4
            ],
            [
                'nama_menu' => 'Setup Aplikasi',
                'level_menu' => 'sub_menu',
                'master_menu' => 4,
                'url' => 'konfigurasi/setup',
                'aktif' => 'Y',
                'no_urut' => 5
            ],
            [
                'nama_menu' => 'Transaksi',
                'level_menu' => 'main_menu',
                'master_menu' => 0,
                'url' => 'transaksi',
                'aktif' => 'Y',
                'no_urut' => 6
            ],
            [
                'nama_menu' => 'Absensi',
                'level_menu' => 'sub_menu',
                'master_menu' => 6,
                'url' => 'transaksi/absensi',
                'aktif' => 'Y',
                'no_urut' => 7
            ],
            [
                'nama_menu' => 'Gaji',
                'level_menu' => 'sub_menu',
                'master_menu' => 6,
                'url' => 'transaksi/gaji',
                'aktif' => 'Y',
                'no_urut' => 8
            ],
        ]);
    }
}
