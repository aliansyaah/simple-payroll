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
                'url' => '',
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
                'url' => '',
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
        ]);
    }
}
