<?php

namespace App\Http\Controllers;

use App\Models\Meja;
use App\Models\Pelanggan;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pelanggans = Pelanggan::all();
        $jumlahPesanan = Pesanan::count();
        return view('Admin.Pelanggan.index', compact('pelanggans', 'jumlahPesanan'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    public function edit(Pelanggan $pelanggan)
    {
        $mejas = Meja::all();
        return view('Admin.Pelanggan.edit', compact('pelanggan', 'mejas'));
    }
    

    public function update(Request $request, Pelanggan $pelanggan)
    {
        $request->validate([
            'Nama_Pelanggan' => 'required',
            'ID_Meja' => 'required|exists:mejas,ID_Meja'
        ]);

        $pelanggan->update($request->all());

        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil diperbarui.');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pelanggan $pelanggan)
    {
        $pelanggan->delete();
        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil dihapus.');
    }
    
}
