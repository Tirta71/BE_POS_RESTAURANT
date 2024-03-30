<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $primaryKey = 'ID_Menu';
    protected $fillable = [
        'Nama_Menu',
        'Harga',
        'ID_Kategori',
        'ImageMenu',
    ];

    public function kategoriMenu()
    {
        return $this->belongsTo(KategoriMenu::class, 'ID_Kategori');
    }
}
