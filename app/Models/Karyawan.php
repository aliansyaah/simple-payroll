<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $table = 'karyawan';

    public function jabatan()
    {
        return $this->belongsTo('\App\Jabatan');

        /* Jika nama kolom bukan jabatan_id di tabel karyawan, krn laravel otomatis menganggap foreign key itu namaTabel_id */
        // return $this->belongsTo('\App\Jabatan', 'id_jab');
    }

    public function karyawan_details()
    {
        return $this->hasOne('\App\Models\Karyawan_details', 'karyawan_id');
    }

    public function karyawan_keluarga()
    {
        return $this->hasMany('\App\Models\Karyawan_keluarga', 'karyawan_id');
    }

    public function absensi()
    {
        return $this->hasMany('\App\Models\Absensi', 'karyawan_id');
    }
    
}
