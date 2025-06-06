<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Konfig;
use Carbon\Carbon;

class CheckIsOpen
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $now = Carbon::now();

        $data = Konfig::where('aktif', 1)->first();
        
        if(isset($data)){
            $tgl_buka = Carbon::parse($data->tgl_buka);
            $tgl_tutup = Carbon::parse($data->tgl_tutup);
            
            if($now < $tgl_buka) {
                return redirect('/commingSoon');
            }
        }

        return $next($request);
    }
}
