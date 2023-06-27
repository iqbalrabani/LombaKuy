<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tim extends Model
{
    protected $table = 'tims';
    protected $fillable = [
        'namaTim',
        'idPengguna',
    ];
}
