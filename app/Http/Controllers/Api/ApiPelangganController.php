<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Meja;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class ApiPelangganController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'Nama_Pelanggan' => 'required|string|max:255',
            'Nomor_Meja' => 'required|exists:mejas,Nomor_Meja',
        ]);

        // Temukan meja berdasarkan nomor meja
        $meja = Meja::where('Nomor_Meja', $request->input('Nomor_Meja'))->firstOrFail();

        // Periksa apakah meja tersedia sebelum membuat pelanggan
        if ($meja->Status !== 'tersedia') {
            return response()->json([
                'message' => 'Meja tidak tersedia untuk pemesanan',
            ], 422);
        }

        // Buat pelanggan baru
        $pelanggan = Pelanggan::create([
            'Nama_Pelanggan' => $request->input('Nama_Pelanggan'),
            'ID_Meja' => $meja->ID_Meja,
        ]);

        
        $meja->Status = 'ditempati';
        $meja->save();

        // Beri respon berhasil
        return response()->json([
            'message' => 'Pelanggan berhasil dibuat',
            'pelanggan' => $pelanggan,
        ], 201);
    }
}
