<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $table = 'pesanans'; 
    protected $primaryKey = 'ID_Pesanan';
    protected $fillable = ['ID_Pelanggan', 'status']; 

  
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'ID_Pelanggan', 'ID_Pelanggan');
    }

  
    public function menus()
    {
        return $this->belongsToMany(Menu::class, 'menu_pesanans', 'ID_Pesanan', 'ID_Menu')
                    ->withPivot('Jumlah', 'Harga') 
                    ->withTimestamps(); 
    }
}
