<?php

namespace App\Http\Controllers;

use App\Models\Pendaftar;
use App\Models\Lomba;
use App\Models\KatPeserta;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

use RealRashid\SweetAlert\Facades\Alert;

class PendaftarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id=0)
    {
        $data = Pendaftar::where(function($query) use($id){
            if($id > 0){
                $query->where('id_lomba', $id);
            }
        })->get();
        return view("admin.pendaftar.index", [
            'id' => $id,
            'data' => $data,
            'subtitle' => Lomba::find($id),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        return view('admin.pendaftar.formulir', [
            'id_lomba' => $id,
            'katPeserta' => KatPeserta::where('id_lomba', $id)->get(),
            'next' => 'store',
        ]);
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
        $reqData = $request->only('id_lomba', 'id_peserta', 'no_peserta', 'nama', 'alamat', 'pic', 'telp', 'aktif', 'ketua', 'telp_ketua');
        if(isset($reqData['aktif']) && $reqData['aktif'] == 'on'){
            $reqData['aktif'] = 1;
        }else{
            $reqData['aktif'] = 0;
        }
        //dd($reqData);
        $validator = Validator::make($reqData, [
            'id_lomba' => 'required',
            'no_peserta' => [
                'sometimes',
                Rule::unique('pendaftars')->where(function ($query) use($reqData) {
                    return $query->where('id_lomba', $reqData['id_lomba'])
                    ->where('no_peserta', $reqData['no_peserta']);
                }),
            ],
            'nama' => [
                'required',
                'min:3',
                Rule::unique('pendaftars')->where(function ($query) use($reqData) {
                    return $query->where('id_lomba', $reqData['id_lomba'])
                    ->where('nama', $reqData['nama']);
                }),
            ],
            'alamat' => 'sometimes|nullable|min:3',
            'pic' => 'sometimes|nullable|min:3',
            'telp' => 'sometimes|nullable|min:3',
        ],[
            'nama.required' => 'Kategori Lomba tidak boleh kosong',

            'no_peserta.unique' => 'Nomor Peserta telah terdaftar',
            
            'nama.required' => 'Nama Regu / Instansi tidak boleh kosong',
            'nama.min' => 'Nama Regu / Instansi minimal 3 Karakter',
            'nama.unique' => 'Nama Regu / Instansi telah terdaftar',

            'alamat.min' => 'Alamat minimal 3 Karakter',
            'pic.min' => 'Nama PIC minimal 3 Karakter',
            'telp.min' => 'Nomor Telp/WA minimal 3 Karakter',
        ]);

        if($validator->fails())
        {
            return back()->with('errors', $validator->messages()->all()[0])->withInput();
        }
        
        Pendaftar::create($reqData);
        return redirect('pendaftar/'.$reqData['id_lomba'])->withSuccess('Data Pendaftaran berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pendaftar  $pendaftar
     * @return \Illuminate\Http\Response
     */
    public function show(pendaftar $pendaftar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pendaftar  $pendaftar
     * @return \Illuminate\Http\Response
     */
    public function edit(pendaftar $pendaftar, $id)
    {
        //
        return view('admin.pendaftar.formulir', [
            'id_lomba' => $id,
            'next' => 'update',
            'data' => $pendaftar::find($id),
            'title' => "Edit Pendaftar",
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pendaftar  $pendaftar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pendaftar $pendaftar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pendaftar  $pendaftar
     * @return \Illuminate\Http\Response
     */
    public function destroy(pendaftar $pendaftar)
    {
        //
    }
}
