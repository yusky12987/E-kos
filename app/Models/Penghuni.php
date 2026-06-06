<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Kamar;

class Penghuni extends Model
{
    protected $fillable = [
        'nama',
        'no_hp',
        'alamat',
        'kamar_id'
    ];

    public function kamar()
    {
        return $this->belongsTo(Kamar::class);
    }

    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class);
    }
}