<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\KatPeserta;
use App\Models\Pendaftar;

class ApiController extends Controller
{
    //
    public function getKatPeserta($id_lomba)
    {
        $retval = KatPeserta::where('id_lomba',$id_lomba)->get();
        return response()->json($retval, 200);
    }

    public function cekNomorPeserta($id_lomba, $id_peserta)
    {
        $katPeserta = KatPeserta::find($id_peserta);  
        
        $c = 1;
        $ckey = $katPeserta->no_peserta_prefix.(sprintf('%03d', $c));
        $nomor = [
            $ckey => "",
        ];
        $data = [];

        $retval = Pendaftar::where('id_lomba',$id_lomba)->where('id_peserta', $id_peserta)->orderByRaw('cast(no_peserta as unsigned) asc')->get();

        if($retval){
            foreach ($retval as $key => $value) {
                /*if($ckey == $key){
                    $nomor[$ckey] = $value;
                    //$ckey = $ckey +1;   
                    $data[] = [
                        $ckey,
                        $nomor[$ckey]
                    ];
                }else{
                    for ($i=$ckey; $i <= $key ; $i++) { 
                        if($i == $key){
                            $nomor[$i] = $value;
                            $ckey = $i;
                        }else{
                            $nomor[$i] = "";
                        }
                        $data[] = [
                            $ckey,
                            $nomor[$i]
                        ];
                    }
                }
                $ckey = $ckey +1;*/
                if($value->no_peserta == $ckey){
                    $data[] = [$value->no_peserta, $value->nama];    
                }else{
                    for ($i=$ckey; $i <= $value->no_peserta ; $i++) { 
                        if($i == $value->no_peserta){
                            $data[] = [$i, $value->nama];    
                            $ckey = $i;
                        }else{
                            $data[] = [$i, ""];    
                        }
                    }
                }
                $ckey = $ckey +1;
            }
        }

        $response = ["data" => $data];
        return response()->json($response, 200);
    }
}
