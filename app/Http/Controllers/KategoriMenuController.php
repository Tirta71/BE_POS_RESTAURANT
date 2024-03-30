<?php

namespace App\Http\Controllers;

use App\Models\KategoriMenu;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class KategoriMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategoriMenus = KategoriMenu::all();
        $jumlahPesanan = Pesanan::count();
        return view('Admin.Menu.Kategori Menu.kategoriMenu', compact('kategoriMenus', 'jumlahPesanan'));
    }

    public function create()
    {
        return view('Admin.Menu.Kategori Menu.createKategori');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Nama_Kategori' => 'required|string|max:255',
        ]);

        KategoriMenu::create($request->all());

        return redirect()->route('kategori-menus.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    // public function show(KategoriMenu $kategoriMenu)
    // {
    //     return view('kategori-menus.show', compact('kategoriMenu'));
    // }

    public function edit(KategoriMenu $kategoriMenu)
    {
        return view('Admin.Menu.Kategori Menu.updateKategori', compact('kategoriMenu'));
    }

    public function update(Request $request, KategoriMenu $kategoriMenu)
    {
        $request->validate([
            'Nama_Kategori' => 'required|string|max:255',
        ]);

        $kategoriMenu->update($request->all());

        return redirect()->route('kategori-menus.index')->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy(KategoriMenu $kategoriMenu)
    {
        $kategoriMenu->delete();

        return redirect()->route('kategori-menus.index')->with('success', 'Kategori berhasil dihapus.');
    }
}
