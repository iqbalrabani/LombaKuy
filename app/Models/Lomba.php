<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lomba extends Model
{
    protected $table = 'lombas';
    protected $fillable = [
        'idLomba',
        'namaLomba',
        'kategoriLomba',
        'Kapasitas',
        'batasPendaftaran',
        'penyelenggara',
        'biaya'
    ];
}
