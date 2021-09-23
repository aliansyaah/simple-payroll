<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $karyawan = Karyawan::find(1);
        // Krn model Karyawan sdh berelasi dgn Jabatan, maka tinggal panggil saja
        $jabatan = Karyawan::find(1)->jabatan;

        // dd($karyawan);
        echo "Nama Karyawan: ".$karyawan->nama_karyawan;
        echo "<br>Jabatan: ".$jabatan->nama_jabatan;
        echo "<br>Gaji Pokok: ".$jabatan->gaji_pokok;
        echo "<br>";
        
        $keluarga = Karyawan::find(1)->karyawan_keluarga;
        foreach($keluarga as $val){
            echo "<br>Nama: ".$val->nama.', Hubungan: '.$val->hubungan;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
