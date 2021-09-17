<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setup extends Model
{
    // Memberi tahu bahwa model "Setup" tabelnya adalah "setup_aplikasi"
    protected $table = 'setup_aplikasi';

    // Mass assignment (menentukan kolom apa aja yg bisa diisi)
    protected $fillable = ['nama_aplikasi', 'jumlah_hari_kerja'];
}
