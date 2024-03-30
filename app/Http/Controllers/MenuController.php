<?php

namespace App\Http\Controllers;

use App\Models\KategoriMenu;
use App\Models\Menu;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class MenuController extends Controller
{
 
    public function index()
    {
        $menus = Menu::all();
        $jumlahPesanan = Pesanan::count();
        return view('Admin.Menu.menus.index', compact('menus', 'jumlahPesanan'));
    }

    public function create()
    {
        $kategoriMenus = KategoriMenu::all();
        return view('Admin.Menu.menus.createMenus', compact('kategoriMenus'));
    }

 
    public function store(Request $request)
    {
        $request->validate([
            'Nama_Menu' => 'required',
            'Harga' => 'required',
            'ID_Kategori' => 'required',
            'ImageMenu' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $menu = new Menu([
            'Nama_Menu' => $request->get('Nama_Menu'),
            'Harga' => $request->get('Harga'),
            'ID_Kategori' => $request->get('ID_Kategori'),
        ]);
    
        if ($request->hasFile('ImageMenu')) {
            $image = $request->file('ImageMenu');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $menu->ImageMenu = $imageName; // Pastikan menggunakan nama kolom yang benar
        }
    
        $menu->save();
    
        return redirect()->route('menus.index')->with('success', 'Menu berhasil ditambahkan.');
    }
    

 
    public function show(Menu $menu)
    {
        return view('menus.show', compact('menu'));
    }


    public function edit(Menu $menu)
    {
        $kategoriMenus = KategoriMenu::all();
        return view('Admin.Menu.menus.updateMenus', compact('menu', 'kategoriMenus'));
    }

  
    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'Nama_Menu' => 'required',
            'Harga' => 'required',
            'ID_Kategori' => 'required',
            'ImageMenu' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $menu->Nama_Menu = $request->get('Nama_Menu');
        $menu->Harga = $request->get('Harga');
        $menu->ID_Kategori = $request->get('ID_Kategori');

        if ($request->hasFile('ImageMenu')) {
            $image = $request->file('ImageMenu');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $menu->ImageMenu = $imageName;
        }

        $menu->save();

        return redirect()->route('menus.index')->with('success', 'Menu berhasil diperbarui.');
    }

 
    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->route('menus.index')->with('success', 'Menu berhasil dihapus.');
    }
}
