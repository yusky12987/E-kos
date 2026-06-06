<?php

namespace App\Models;

use App\Models\Penghuni;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
     protected $fillable = [
        'nomor_kamar',
        'harga',
        'lantai',
        'status',
        'deskripsi'
    ];

    public function penghuni()
    {
        return $this->hasMany(Penghuni::class);
    }
}

