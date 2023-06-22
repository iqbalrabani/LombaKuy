<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_lomba extends Model
{
    public $timestamps = false;
    protected $table = 'user_lombas';
    protected $fillable = [
        'idLomba',
        'idPengguna',
    ];
}
