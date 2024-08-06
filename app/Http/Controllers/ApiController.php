<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\KatPeserta;

class ApiController extends Controller
{
    //
    public function getKatPeserta($id_lomba){
        $retval = KatPeserta::where('id_lomba',$id_lomba)->get();
        return response()->json($retval, 200);
    }
}
