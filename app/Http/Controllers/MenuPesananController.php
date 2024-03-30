<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\MenuPesanan;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class MenuPesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menu_pesanans = MenuPesanan::all();
        return view('Admin.Menu Pesanan.index', compact('menu_pesanans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pesanans = Pesanan::all(); 
        $menus = Menu::all();
        return view('Admin.Menu Pesanan.createMenuPesanan', compact('pesanans', 'menus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'ID_Pesanan' => 'required|exists:pesanans,ID_Pesanan',
            'ID_Menu' => 'required|exists:menus,ID_Menu',
            'Jumlah' => 'required|integer|min:1',
            'Harga' => 'required|numeric|min:0',
        ]);

        MenuPesanan::create($request->all());

        return redirect()->route('menu_pesanans.index')
            ->with('success', 'Menu pesanan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(MenuPesanan $menu_pesanan)
    {
        return view('menu_pesanans.show', compact('menu_pesanan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $menu_pesanan = MenuPesanan::find($id);
        $pesanans = Pesanan::all(); 
        $menus = Menu::all();
        return view('Admin.Menu Pesanan.updateMenuPesanans', compact('menu_pesanan', 'pesanans', 'menus'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MenuPesanan $menu_pesanan)
    {
        $request->validate([
            'ID_Pesanan' => 'required|exists:pesanans,ID_Pesanan',
            'ID_Menu' => 'required|exists:menus,ID_Menu',
            'Jumlah' => 'required|integer|min:1',
            'Harga' => 'required|numeric|min:0',
        ]);

        $menu_pesanan->update($request->all());

        return redirect()->route('menu_pesanans.index')
            ->with('success', 'Menu pesanan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MenuPesanan $menu_pesanan)
    {
        $menu_pesanan->delete();

        return redirect()->route('menu_pesanans.index')
            ->with('success', 'Menu pesanan berhasil dihapus.');
    }
}
