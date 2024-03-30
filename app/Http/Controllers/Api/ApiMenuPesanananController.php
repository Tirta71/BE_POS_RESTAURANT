<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\MenuPesanan;
use Illuminate\Http\Request;

class ApiMenuPesanananController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'ID_Pesanan' => 'required|exists:pesanans,ID_Pesanan',
            'ID_Menu' => 'required|array',
            'ID_Menu.*' => 'exists:menus,ID_Menu',
            'Jumlah' => 'required|array',
        ]);
    
        $ID_Pesanan = $request->input('ID_Pesanan');
        $ID_Menu = $request->input('ID_Menu');
        $Jumlah = $request->input('Jumlah');
    
        $savedItems = [];
    
        // Simpan data ke dalam database
        foreach ($ID_Menu as $key => $idMenu) {
            // Ambil harga menu dari database
            $hargaMenu = Menu::find($idMenu)->Harga;
            
            // Hitung harga total berdasarkan jumlah
            $hargaTotal = $hargaMenu * $Jumlah[$key];
            
            // Simpan data ke dalam database
            $menuPesanan = MenuPesanan::create([
                'ID_Pesanan' => $ID_Pesanan,
                'ID_Menu' => $idMenu,
                'Jumlah' => $Jumlah[$key],
                'Harga' => $hargaTotal,
            ]);
    
            $savedItems[] = $menuPesanan;
        }
    
        return response()->json([
            'message' => 'Menu Pesanan berhasil disimpan',
            'saved_items' => $savedItems
        ], 201);
    }
    
}
