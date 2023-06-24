<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'members';
    public $timestamps = false;
    protected $fillable = [
        'idPengguna',
        'namaMember'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'idPengguna');
    }
}
