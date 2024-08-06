<?php

namespace App\Http\Controllers;

use App\Models\Penilaian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

use RealRashid\SweetAlert\Facades\Alert;

use App\Models\Lomba;
use App\Models\Pendaftar;
use App\Models\JuriKategori;
use App\Models\User;
use App\Models\KatPeserta;

class PenilaianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id)
    {
        //
        $data = Pendaftar::where(function($query) use($id){
            if($id > 0){
                $query->where('id_lomba', $id);
            }
        })->get();

        return view("admin.penilaian.index", [
            'id' => $id,
            'data' => $data,
            'subtitle' => Lomba::find($id),
            'penilaian' => JuriKategori::where('id_lomba', $id)->get(),
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penilaian  $penilaian
     * @return \Illuminate\Http\Response
     */
    public function show(Penilaian $penilaian, $id)
    {
        //
        $data = Pendaftar::find($id);
        //dd($data);
        $katPeserta = KatPeserta::select('ref_kecepatan')->find($data->id_peserta);
        
        $waktu_referensi = 0;
        if($data->id_lomba == 1){
            $waktu_referensi = (8 / $katPeserta->ref_kecepatan) * 3600;
        }else{
            $waktu_referensi = (17 / $katPeserta->ref_kecepatan) * 3600;
        }
        
        //dd($katPeserta->ref_kecepatan);

        return view('admin.penilaian.formulir', [
            'data' => $data,
            //'waktu_referensi' => gmdate("H:i:s", $waktu_referensi),
            'waktu_referensi' => $waktu_referensi,
            'penilaian' => JuriKategori::where('id_lomba', $data->id_lomba)->get(),
            'next' => 'update',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penilaian  $penilaian
     * @return \Illuminate\Http\Response
     */
    public function edit(Penilaian $penilaian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Penilaian  $penilaian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penilaian $penilaian)
    {
        //
        //dd($request->all());
        $id = $request->id;
        $id_lomba = $request->id_lomba;
        $reqData = $request->only('waktu_start', 'waktu_finish');

        if($request->jns == 1){
            $validator = Validator::make($reqData, [
                'waktu_start' => 'required',
                'waktu_finish' => 'sometimes|nullable|after:waktu_start',
            ],[
                'waktu_start.required' => 'Waktu start tidak boleh kosong',
                'waktu_finish.after' => 'Waktu finish tidak boleh sebelum waktu start',
            ]);

            if($validator->fails())
            {
                return back()->with('errors', $validator->messages()->all()[0])->withInput();
            }
            
            Pendaftar::find($id)->update($reqData);
            return redirect('penilaian/'.$id_lomba)->withSuccess('Pencatatan Waktu berhasil ditambahkan');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penilaian  $penilaian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penilaian $penilaian)
    {
        //
    }
}
