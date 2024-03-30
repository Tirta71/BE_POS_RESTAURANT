<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Meja;
use Illuminate\Http\Request;

class ApiMejaController extends Controller
{
    public function updateStatus(Request $request, $nomor_meja)
    {
        $this->validate($request, [
            'Status' => 'required|in:tersedia,dipesan,ditempati',
        ]);
    
        $meja = Meja::where('Nomor_Meja', $nomor_meja)->firstOrFail();
    
        $meja->Status = $request->input('Status');
        $meja->save();
    
        return response()->json([
            'message' => 'Status meja berhasil diperbarui',
            'meja' => $meja,
        ], 200);
    }
    
}
