<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KategoriMenu;

class ApiKategoriMenuController extends Controller
{
    // Menampilkan semua kategori menu
    public function index()
    {
        $kategoriMenus = KategoriMenu::all();
        return response()->json($kategoriMenus, 200);
    }

    // Menampilkan kategori menu berdasarkan ID
    public function show($id)
    {
        $kategoriMenu = KategoriMenu::find($id);
        if (!$kategoriMenu) {
            return response()->json(['message' => 'Kategori Menu not found'], 404);
        }
        return response()->json($kategoriMenu, 200);
    }
}
