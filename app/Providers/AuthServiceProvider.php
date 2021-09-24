<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        'App\Models\Divisi' => 'App\Policies\DivisiPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Mendefinisikan akses untuk user mengakses suatu halaman
        Gate::define('akses', function($user){
            // return true;
            $role = User::find($user->id)->role;
            foreach ($role as $r) {
                if($r->id == 1){    // 1 adalah ID role admin
                    return true;
                }
            }
            return false;
        });

        // Mendefinisikan tambah_data untuk visibility tombol "Tambah Data"
        Gate::define('tambah_data', function($user){
            // return true;
            $role = User::find($user->id)->role;
            foreach ($role as $r) {
                if($r->id == 1){    // 1 adalah ID role admin
                    return true;
                }
            }
            return false;
        });

        // Mendefinisikan tambah_data untuk visibility tombol "Hapus Data"
        Gate::define('hapus_data', function($user){
            // return true;
            $role = User::find($user->id)->role;
            foreach ($role as $r) {
                if($r->id == 1){    // 1 adalah ID role admin
                    return true;
                }
            }
            return false;
        });
    }
}
