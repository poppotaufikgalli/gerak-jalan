<?php

namespace App\Http\Controllers;

use App\Models\Konfig;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

use RealRashid\SweetAlert\Facades\Alert;

class KonfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($tahun = "")
    {
        $data = null;
        $next = 'store';
        if($tahun != ""){
            $data = Konfig::where('tahun', $tahun)->first();
            if($data){
                $next = 'update';    
            }
        }

        confirmDelete("Menghapus Konfigurasi", "Apakah anda yakin untuk menghapus data ini?");

        return view('admin.konfig', [
            'data' => $data,
            'next' => $next,
            'listData' => Konfig::all(),
        ]);
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
        $reqData = $request->only('tahun', 'tgl_buka', 'tgl_tutup', 'min_no_peserta', 'aktif');
        if(isset($reqData['aktif']) && $reqData['aktif'] == 'on'){
            $reqData['aktif'] = 1;
        }else{
            $reqData['aktif'] = 0;
        }

        $validator = Validator::make($reqData, [
            'tahun' => 'required|unique:konfigs,tahun',
        ],[
            'tahun.required' => 'Tahun tidak boleh kosong',
            'tahun.unique' => 'Tahun telah terdaftar',
        ]);

        if($validator->fails())
        {
            return back()->with('errors', $validator->messages()->all()[0])->withInput();
        }

        $id = Konfig::create($reqData)->id;
        $this->updateAktif($id, $reqData['aktif']);
        return redirect('konfig')->withSuccess('Data Konfigurasi Lomba berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Konfig  $konfig
     * @return \Illuminate\Http\Response
     */
    public function show(Konfig $konfig)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Konfig  $konfig
     * @return \Illuminate\Http\Response
     */
    public function edit(Konfig $konfig)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Konfig  $konfig
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Konfig $konfig)
    {
        $id = $request->id;
        $reqData = $request->only('tahun', 'tgl_buka', 'tgl_tutup', 'min_no_peserta', 'aktif');
        if(isset($reqData['aktif']) && $reqData['aktif'] == 'on'){
            $reqData['aktif'] = 1;
        }else{
            $reqData['aktif'] = 0;
        }

        $validator = Validator::make($reqData, [
            'tahun' => 'required|unique:konfigs,tahun,'.$id,
        ],[
            'tahun.required' => 'Tahun tidak boleh kosong',
            'tahun.unique' => 'Tahun telah terdaftar',
        ]);

        if($validator->fails())
        {
            return back()->with('errors', $validator->messages()->all()[0])->withInput();
        }

        Konfig::find($id)->update($reqData);
        $this->updateAktif($id, $reqData['aktif']);
        return redirect('konfig')->withSuccess('Data Konfigurasi Lomba berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Konfig  $konfig
     * @return \Illuminate\Http\Response
     */
    public function destroy(Konfig $konfig, $id)
    {
        //
        $konfig->find($id)->delete();
        return redirect('konfig')->withSuccess('Data Konfigurasi Lomba berhasil dihapus');
    }

    protected function updateAktif($id, $aktif)
    {
        if($aktif == 1){
            Konfig::whereNot('id', $id)->update(['aktif' => 0]);
        }
    }
}
