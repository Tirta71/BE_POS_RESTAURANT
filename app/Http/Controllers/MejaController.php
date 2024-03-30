<?php

namespace App\Http\Controllers;

use App\Models\Meja;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class MejaController extends Controller
{

    public function index()
    {
        $mejas = Meja::all();
        $jumlahPesanan = Pesanan::count();
        return view('Admin.Table.meja', compact('mejas', 'jumlahPesanan'));
    }


    public function create()
    {
        return view('Admin.Meja.createMeja');
    }


    public function store(Request $request)
    {
        $request->validate([
            'Nomor_Meja' => 'required|unique:mejas,Nomor_Meja',
            'Kapasitas' => 'required|integer',
            'Status' => 'required|in:tersedia,dipesan,ditempati',
        ]);

        Meja::create([
            'Nomor_Meja' => $request->Nomor_Meja,
            'Kapasitas' => $request->Kapasitas,
            'Status' => $request->Status,
        ]);

        return redirect()->route('list-meja.index')->with('success', 'Meja berhasil ditambahkan.');
    }


    public function show(string $id)
    {
        $meja = Meja::findOrFail($id);
        return view('meja.show', compact('meja'));
    }


    public function edit(string $ID_Meja)
    {
        $meja = Meja::findOrFail($ID_Meja);
        return view('Admin.Meja.updateMeja', compact('meja'));
    }

    public function update(Request $request, string $ID_Meja)
    {
        $meja = Meja::findOrFail($ID_Meja);
    
        $request->validate([
            'Nomor_Meja' => 'required|unique:mejas,Nomor_Meja,' . $meja->ID_Meja . ',ID_Meja',
            'Kapasitas' => 'required|integer',
            'Status' => 'required|in:tersedia,dipesan,ditempati',
        ]);
    
        $meja->update([
            'Nomor_Meja' => $request->Nomor_Meja,
            'Kapasitas' => $request->Kapasitas,
            'Status' => $request->Status,
        ]);
    
        return redirect()->route('list-meja.index')->with('success', 'Meja berhasil diperbarui.');
    }
    

    /**
     * Menghapus meja tertentu dari penyimpanan.
     */
    public function destroy(string $ID_Meja)
    {
        $meja = Meja::findOrFail($ID_Meja);
        $meja->delete();
        return redirect()->route('list-meja.index')->with('success', 'Meja berhasil dihapus.');
    }
}
