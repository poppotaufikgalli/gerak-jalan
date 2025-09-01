<?php

namespace App\Http\Controllers;

use App\Models\Pendaftar;
use App\Models\Reset;
use App\Models\User;
use Illuminate\Http\Request;

class ResetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id_lomba)
    {
        //
        $posJuri = User::whereHas('juri_kategori', function($query) use($id_lomba){
            $query->where('juri_kategoris.id_lomba', $id_lomba);
        })->where('gid', 2)->where('aktif', 1)->get();

        $data = [
            'next' => 'store',
            'id_lomba' => $id_lomba,
            'posJuri' => $posJuri,
        ];

        if($request->method() == 'POST'){
            $reqData = $request->only('no_peserta');
            //dd($reqData);
            //dd($request->all());
            $pendaftar = Pendaftar::where('id_lomba', $id_lomba)->where('no_peserta', $reqData['no_peserta'])->first();
            if($pendaftar){
                $data['data'] = $pendaftar;
            }else{
                return redirect()->back()->with('errors', "Data Tidak ditemukan");
            }
        }

        return view('admin.reset.formulir', $data);
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
     * @param  \App\Models\Reset  $reset
     * @return \Illuminate\Http\Response
     */
    public function show(Reset $reset)
    {
        //
        $data = Pendaftar::find($id);
        $katPeserta = KatPeserta::select('ref_kecepatan')->find($data->id_peserta);
        
        $waktu_referensi = 0;
        //dd($data->id_lomba);
        if($data->id_lomba == 17){
            //$waktu_referensi = (8 / $katPeserta->ref_kecepatan) * 3600;

            /* 2025-08-22 jarak pengukuran 7 km 950 m */
            $waktu_referensi = (7.95 / $katPeserta->ref_kecepatan) * 3600;
        }else if($data->id_lomba == 18){
            //$waktu_referensi = (17 / $katPeserta->ref_kecepatan) * 3600;

            /* 2025-08-22 jarak pengukuran 17 km 100 m */
            $waktu_referensi = (17.1 / $katPeserta->ref_kecepatan) * 3600;
        }else if($data->id_lomba == 19){
            //$waktu_referensi = (45 / $katPeserta->ref_kecepatan) * 3600;

            /* 2025-08-22 jarak pengukuran 45 km 100 m */
            $waktu_referensi = (45.1 / $katPeserta->ref_kecepatan) * 3600;
            // tambahan 30 menit untuk 45 Km
            $waktu_referensi = $waktu_referensi + 1800;
        }

        $a = $penilaian->where('id_pendaftar', $id)->get();

        $dataPenilaian = [];

        foreach ($a as $key => $value) {
            $dataPenilaian[$value->id_nilai][$value->id_juri] = $value->nilai;
        }

        if($data->waktu_tempuh > 0){
            $selisih = $data->waktu_tempuh - $waktu_referensi;
            $menit = intVal($selisih/60);
            $detik = $selisih % 60;
            $selisih = $detik > 5 ? $menit +1 : $menit;    
        }else{
            $selisih = 0;
        }

        $domWaktu = [
            17 => ['hidden', '2025-08-24', '2025-08-24'],
            18 => ['hidden', '2025-08-23', '2025-08-23'],
            19 => ['date', '2025-08-30', '2025-08-31'],
        ];

        return view('admin.penilaian.formulir', [
            'data' => $data,
            'ref_kecepatan' => $katPeserta->ref_kecepatan,
            'waktu_referensi_1' => gmdate("H:i:s", $waktu_referensi),
            'waktu_referensi' => $waktu_referensi,
            'posJuri' => JuriKategori::whereHas('juri', function($query){
                $query->where('gid', 2)->where('aktif',1);
            })->where('id_lomba', $data->id_lomba)->get(),
            'penilaian' => $dataPenilaian,
            'selisih' => $selisih,
            'domWaktu' => $domWaktu,
            'next' => 'update',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reset  $reset
     * @return \Illuminate\Http\Response
     */
    public function edit(Reset $reset)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reset  $reset
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reset $reset)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reset  $reset
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reset $reset)
    {
        //
    }
}
