<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meja extends Model
{
    use HasFactory;

    protected $fillable = [
        'Nomor_Meja',
        'Kapasitas',
        'Status',
    ];

    protected $primaryKey = 'ID_Meja';
}
