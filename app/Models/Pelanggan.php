<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $fillable = ['Nama_Pelanggan', 'ID_Meja'];
    protected $primaryKey = 'ID_Pelanggan';
    
    public function meja()
    {
        return $this->belongsTo(Meja::class, 'ID_Meja');
    }
}
