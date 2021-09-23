<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $table = 'karyawan';

    public function jabatan()
    {
        return $this->belongsTo('\App\Jabatan');
    }
    
}
