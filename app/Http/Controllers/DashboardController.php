<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\Meja;
use App\Models\Pelanggan;
use App\Models\MenuPesanan;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahPesanan = Pesanan::count();
        $jumlahMejaTersedia = Meja::where('status', 'tersedia')->count();
        $jumlahPelanggan = Pelanggan::count();
        $totalProfit = MenuPesanan::sum('Harga');

        return view('Admin.Dashboard.Dashboard', compact('jumlahPesanan', 'jumlahMejaTersedia', 'jumlahPelanggan', 'totalProfit'));
    }
}
