<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class SiteHelpers
{
    public static function cek_akses()
    {
        // return "Mulai dari null";
        // $user = DB::table('users')->where('username', 'aliansyaah')->get();
        $user = DB::table('users')->where('username', 'aliansyaah')->first();
        return $user;
    }

    public static function main_menu()
    {
        $data = DB::table('akses')
            ->join('menu', 'menu.id', '=', 'akses.menu_id')
            ->select('menu.*', 'akses.akses', 'akses.tambah', 'akses.edit', 'akses.hapus')
            ->where('akses.level_user_id', '1')
            ->where('menu.level_menu', 'main_menu')
            ->get();
        
        return $data;
    }

    public static function sub_menu()
    {
        $data = DB::table('akses')
            ->join('menu', 'menu.id', '=', 'akses.menu_id')
            ->select('menu.*', 'akses.akses', 'akses.tambah', 'akses.edit', 'akses.hapus')
            ->where('akses.level_user_id', '1')
            ->where('menu.level_menu', 'sub_menu')
            ->get();
        
        return $data;
    }

    public static function get_menu_name($url)
    {
        $result = DB::table('menu')->where('url', $url)->first();
        // dd($result);
        if($result){
            $menu_name = $result->nama_menu;
        }else{
            $menu_name = "Nama Menu Tidak Ditemukan";
        }
        return $menu_name;
    }
}