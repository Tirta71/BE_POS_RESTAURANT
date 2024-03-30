<?php

namespace App\Http\Controllers;

use App\Models\MenuPesanan;
use App\Models\Pelanggan;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function index()
    {
        $pesanans = Pesanan::all();
        $menuPesananModel = new MenuPesanan(); // Instance dari model MenuPesanan
        return view('Admin.Pesanan.pesanan', compact('pesanans', 'menuPesananModel'));
    }

    public function create()
    {
        $pelanggans = Pelanggan::all(); 
        return view('Admin.Pesanan.createPesanan', compact('pelanggans')); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'ID_Pelanggan' => 'required|exists:pelanggans,ID_Pelanggan',
        ]);

        Pesanan::create($request->all());

        return redirect()->route('pesanans.index')->with('success', 'Pesanan berhasil dibuat');
    }

    public function show(Pesanan $pesanan)
    {
        return view('pesanans.show', compact('pesanan'));
    }

    public function edit($ID_Pesanans)
    {
        $pesanan = Pesanan::findOrFail($ID_Pesanans);
        $pelanggans = Pelanggan::all(); 
    
        return view('Admin.Pesanan.updatePesanans', compact('pesanan', 'pelanggans'));
    }

    public function update(Request $request, Pesanan $pesanan)
    {
        $request->validate([
            'ID_Pelanggan' => 'required|exists:pelanggans,ID_Pelanggan',
        ]);

        $pesanan->update($request->all());

        return redirect()->route('pesanans.index')->with('success', 'Pesanan berhasil diperbarui');
    }

    public function destroy(Pesanan $pesanan)
    {
        $pesanan->delete();

        return redirect()->route('pesanans.index')->with('success', 'Pesanan berhasil dihapus');
    }
}
