<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftar;
use App\Models\Lomba;
use App\Models\KatPeserta;
use App\Models\Konfig;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Password;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;

use DB;
use App\Rules\ReCaptcha;

class MainController extends Controller
{
    public function index()
    {
        return view("main");
    }

    public function daftarPeserta($id=0)
    {
        return view("daftarPeserta", [
            "selPeserta" => KatPeserta::find($id),
            "selid" => $id,
            "katPeserta" => KatPeserta::all(),
            'data' => Pendaftar::where('id_peserta', $id)->orderByRaw('CONVERT(no_peserta, SIGNED) desc')->get(),
        ]);
    }

    public function formPendaftaranPeserta($id_lomba, $id_peserta=null)
    {
        $data = Konfig::where('aktif', 1)->first();

        $now = strtotime(date("Y-m-d H:i:s"));
        $tgl_buka = strtotime($data->tgl_buka);
        $tgl_tutup = strtotime($data->tgl_tutup);

        //dd($now, $tgl_buka, $tgl_tutup);
        //dd($now >= $tgl_buka, $now <= $tgl_tutup, date("Y-m-d H:i:s",$now), date("Y-m-d H:i:s",$tgl_buka));

        if($now >= $tgl_buka && $now <= $tgl_tutup) {
            return view("formPendaftaranPeserta", [
                'id_lomba' => $id_lomba,
                'id_peserta' => $id_peserta,
                'lomba' => Lomba::find($id_lomba),
                'katPeserta' => KatPeserta::where('id_lomba', $id_lomba)->get(),
            ]);
        } else {
            if($now < $tgl_buka) {
                return redirect()->route('index')->with('errors', "Pendaftaran Belum Dibuka, Agar mendaftar kembali setelah Pendaftaran dibuka"); 
            }else if($now > $tgl_tutup){
                return redirect()->route('index')->with('errors', "Pendaftaran Telah Ditutup"); 
            }else{
                return redirect()->route('index')->with('errors', "Pendaftaran Tidak Tersedia"); 
            }
        }    
    }

    public function daftarUmum(Request $request)
    {
        //dd($request);
        $reqData = $request->only('id_lomba', 'id_peserta', 'nama', 'alamat', 'pic', 'telp', 'ketua', 'telp_ketua','jns_instansi', 'g-recaptcha-response');
        //dd($reqData);

        $reqData['aktif'] = 1;

        $validator = Validator::make($reqData, [
            'id_lomba' => 'required',
            'id_peserta' => 'required',
            'nama' => [
                'required',
                'min:3',
                Rule::unique('pendaftars')->where(function ($query) use($reqData) {
                    return $query->where('id_lomba', $reqData['id_lomba'])
                    ->where('nama', $reqData['nama']);
                }),
            ],
            'alamat' => 'required|min:3',
            'pic' => 'required|min:3',
            'telp' => 'required|numeric|min:3',
            'ketua' => 'required|min:3',
            'telp_ketua' => 'required|numeric|min:3',
            'g-recaptcha-response' => ['required', new ReCaptcha],
        ],[
            'id_lomba.required' => 'Kategori Lomba tidak boleh kosong',
            'id_peserta.required' => 'Kategori Peserta tidak boleh kosong',

            'no_peserta.unique' => 'Nomor Peserta telah terdaftar',
            
            'nama.required' => 'Nama Regu / Instansi tidak boleh kosong',
            'nama.min' => 'Nama Regu / Instansi minimal 3 Karakter',
            'nama.unique' => 'Nama Regu / Instansi telah terdaftar',

            'alamat.required' => 'Alamat tidak boleh kosong',
            'alamat.min' => 'Alamat minimal 3 Karakter',

            'pic.required' => 'Nama PIC tidak boleh kosong',
            'pic.min' => 'Nama PIC minimal 3 Karakter',

            'telp.required' => 'Nomor Telp/WA PIC tidak boleh kosong',
            'telp.numeric' => 'Nomor Telp/WA PIC tidak valid',
            'telp.min' => 'Nomor Telp/WA PIC minimal 3 Karakter',

            'ketua.required' => 'Nama Ketua tidak boleh kosong',
            'ketua.min' => 'Nama Ketua minimal 3 Karakter',

            'telp_ketua.required' => 'Nomor Telp/WA Ketua Regu tidak boleh kosong',
            'telp_ketua.numeric' => 'Nomor Telp/WA Ketua Regu tidak valid',
            'telp_ketua.min' => 'Nomor Telp/WA Ketua Regu minimal 3 Karakter',
            'g-recaptcha-response.required' => 'Google ReCaptcha tidak boleh kosong',
        ]);

        if($validator->fails())
        {
            return back()->with('errors', $validator->messages()->all()[0])->withInput();
        }

        //$peserta = Pendaftar::where('id_lomba', $reqData['id_lomba'])->where('id_peserta', $reqData['id_peserta'])->get();
        $reqData['no_peserta'] = $this->getNomorPeserta($reqData);
        //dd($reqData['no_peserta']);

        Pendaftar::create($reqData);
        return redirect('daftar-peserta/'.$reqData['id_peserta'])->withSuccess('Pendaftar telah berhasil dilakukan');
    }

    public function main(){
        $jmlPendaftar = Pendaftar::select('id_lomba', DB::raw('count(*) as total'))->groupBy('id_lomba')->pluck('total', 'id_lomba');

        return view('admin.main', [
            'jmlPendaftar' => $jmlPendaftar,
            'pendaftar' => Pendaftar::all(),
        ]);
    }

    public function rekapHasil($id=null)
    {
        $data = Pendaftar::where(function($query) use ($id){
            if($id != null){
                $query->where('id_peserta', $id);
            }
        })->where('diskualifikasi', 0)->orderBy('total', 'desc')->get();
        $katPeserta = KatPeserta::all();
        
        return view('admin.rekapHasil', [
            'data' => $data,
            'katPeserta' => $katPeserta,
            'id_peserta' => $id,
        ]);
    }

    private function getNomorPeserta($data){
        //dd($data);
        if(isset($data['jns_instansi']) && $data['jns_instansi'] != ""){
            $no_peserta = "100".$data['jns_instansi'];
            $a = Pendaftar::where('no_peserta', $no_peserta)->where('id_lomba', $data['id_lomba'])->where('id_peserta', $data['id_peserta'])->get();
            
            if(count($a) == 0){
                return $no_peserta;
            }else{
                $b = Pendaftar::select('no_peserta')->where('id_lomba', $data['id_lomba'])->where('id_peserta', $data['id_peserta'])->orderByRaw('CONVERT(no_peserta, SIGNED) asc')->get();
                foreach($b as $key => $value){
                    $no_peserta = $value->no_peserta +1;    
                }

                if($no_peserta < 1005){
                    $no_peserta = 1005;
                }

                return $no_peserta;
            }
        }

        $peserta = Pendaftar::select('no_peserta')->where('id_lomba', $data['id_lomba'])->where('id_peserta', $data['id_peserta'])->orderByRaw('CONVERT(no_peserta, SIGNED) asc')->get();
        //dd($peserta);

        if(count($peserta) > 0){
            foreach($peserta as $key => $value){
                $no_peserta = $value->no_peserta +1;    
            }
            return $no_peserta;
        }else{
            $c = KatPeserta::find($data['id_peserta']);    

            $no_peserta = $c->no_peserta_prefix .(sprintf('%03d', $c->no_peserta_mulai));
            return $no_peserta;
        }
    }

    public function resetPassword(Request $request)
    {
        $validated = $request->validate([
            'password' => ['required', 'confirmed'],
        ],[
            'password.required' => "Password tidak boleh kosong",
            'password.confirmed' => "Password tidak sama"
        ]);

        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        return back()->withSuccess('Password berhasil diubah. Silahkan login kembali untuk mencoba password baru');
    }
}
