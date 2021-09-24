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
}