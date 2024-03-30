<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Pesanan; // Sesuaikan dengan model Anda

class GlobalVariablesMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Set variabel global jumlahPesanan
        config(['global.jumlahPesanan' => Pesanan::count()]);
        config(['global.jumlahPesananProses' => Pesanan::where('status', 'proses')->count()]);
        return $next($request);
    }
}
