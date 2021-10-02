<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $table = 'absensi';

    public function karyawan()
    {
        return $this->belongsTo('\App\Models\Karyawan');
    }
}
