<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    protected $table = 'divisi';

    // Mass assignment (menentukan kolom apa aja yg bisa diisi)
    protected $fillable = ['nama'];
}
