<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lomba extends Model
{
    protected $table = 'lombas';
    public $timestamps = false;
    protected $fillable = [
        'idLomba',
        'namaLomba',
        'kategoriLomba',
        'kapasitas',
        'batasPendaftaran',
        'penyelenggara',
        'biaya'
    ];
}
