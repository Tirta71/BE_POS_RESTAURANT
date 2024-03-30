<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use Illuminate\Support\Facades\Validator;

class ApiMenuController extends Controller
{
    // Menampilkan semua menu
    public function index()
    {
        $menus = Menu::all();
        return response()->json($menus, 200);
    }

    // Menampilkan menu berdasarkan ID
    public function show($id)
    {
        $menu = Menu::find($id);
        if (!$menu) {
            return response()->json(['message' => 'Menu not found'], 404);
        }
        return response()->json($menu, 200);
    }
    


}
