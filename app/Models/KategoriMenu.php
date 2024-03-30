<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriMenu extends Model
{
    use HasFactory;

    protected $fillable = [
        'Nama_Kategori'
    ];

    protected $primaryKey = 'ID_Kategori' ;
    public function menus()
{
    return $this->hasMany(Menu::class, 'ID_Kategori');
}

}
