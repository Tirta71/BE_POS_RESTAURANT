<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class ApiPesananController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'ID_Pelanggan' => 'required|exists:pelanggans,ID_Pelanggan',
        ]);

        $pesanan = Pesanan::create([
            'ID_Pelanggan' => $request->input('ID_Pelanggan'),
          
        ]);

        return response()->json([
            'message' => 'Pesanan berhasil dibuat',
            'pesanan' => $pesanan,
        ], 201);
    }
}
