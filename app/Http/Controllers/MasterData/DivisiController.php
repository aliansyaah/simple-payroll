<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use App\Models\Divisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DivisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Divisi::get();
        // dd($data);
        return view('masterdata/divisi', ['data' => $data]);
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

        // Cara store 2
        Divisi::create($request->all());
        return redirect()->back();
    }

    private function _validation(Request $request)
    {
        $validation = $request->validate(
            [
                'nama' => 'required|min:2|max:20'
            ],
            [
                'nama.required' => 'Harus diisi',
                'nama.min' => 'Minimal 2 digit',
                'nama.max' => 'Maksimal 20 digit',
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
    //     return view('masterdata.divisi-edi', ['setup' => $setup]);
    // }
    
    // Cara lain edit lebih simple
    public function edit(Setup $setup)
    {
        return view('masterdata.divisi-edit', compact('setup'));
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
        // echo $id;
        Divisi::destroy($id);
        return redirect()->route('divisi.index');
    }
}
