<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuPesanan extends Model
{
    use HasFactory;

    protected $table = 'menu_pesanans';

    protected $fillable = [
        'ID_Pesanan',
        'ID_Menu',
        'Jumlah',
        'Harga',
    ];

    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class, 'ID_Pesanan', 'ID_Pesanan');
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'ID_Menu', 'ID_Menu');
    }

    public function getTotalHargaPerPesanan($idPesanan)
    {
        // Mengambil semua entri menu pesanan yang memiliki ID_Pesanan yang sama
        $menuPesanan = MenuPesanan::where('ID_Pesanan', $idPesanan)->get();
    
        // Inisialisasi variabel total harga
        $totalHarga = 0;
    
        // Menghitung total harga per ID_Pesanan
        foreach ($menuPesanan as $item) {
            $totalHarga += $item->Harga ;
        }
    
        return $totalHarga;
    }
    

}
