<?php

namespace App\Http\Controllers\Konfigurasi;

use App\Http\Controllers\Controller;
use App\Models\Setup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SetupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $setup = Setup::first();   // first() utk nampilin satu record pertama
        $setup = Setup::get();
        // dd($setup);
        return view('konfigurasi/setup', ['setup' => $setup]);
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
        // dd($request->all());
        $this->_validation($request);

        // Cara store 1
        // $setup = new Setup;
        // $setup->nama_aplikasi = $request->nama_aplikasi;
        // $setup->jumlah_hari_kerja = $request->jumlah_hari_kerja;
        // $setup->save();

        // Cara store 2
        $setup = Setup::create($request->all());
        return redirect()->back();
    }

    private function _validation(Request $request)
    {
        $validation = $request->validate(
            [
                'nama_aplikasi' => 'required|min:3|max:100',
                'jumlah_hari_kerja' => 'required|min:1|max:31|numeric'
            ],
            [
                'nama_aplikasi.required' => 'Harus diisi',
                'nama_aplikasi.min' => 'Minimal 3 digit',
                'nama_aplikasi.max' => 'Maksimal 100 digit',
                'jumlah_hari_kerja.required' => 'Harus diisi',
                'jumlah_hari_kerja.min' => 'Minimal 1 hari',
                'jumlah_hari_kerja.max' => 'Maksimal 31 hari',
                'jumlah_hari_kerja.numeric' => 'Harus angka',
            ]
        );
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
    // public function edit($id)
    // {
    //     // echo $id;
    //     $setup = Setup::find($id);
    //     return view('konfigurasi.setup-edit', ['setup' => $setup]);
    // }
    
    // Cara lain edit lebih simple
    public function edit(Setup $setup)
    {
        return view('konfigurasi.setup-edit', compact('setup'));
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
        // echo $id;die;
        // dd($request->all());
        $this->_validation($request);

        Setup::where('id', $id)->update([
            'nama_aplikasi' => $request->nama_aplikasi,
            'jumlah_hari_kerja' => $request->jumlah_hari_kerja
        ]);
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
