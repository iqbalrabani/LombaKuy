<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'members';
    public $timestamps = false;
    protected $fillable = [
        'idTim',
        'namaMember',
        'kedudukan'
    ];


    public function tim()
    {
        return $this->belongsTo(Tim::class, 'idTim');
    }
}
