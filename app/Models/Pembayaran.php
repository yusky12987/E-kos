<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Penghuni;

class Pembayaran extends Model
{
    protected $fillable = [
        'penghuni_id',
        'jumlah_bayar',
        'tanggal_bayar',
        'status',
        'keterangan'
    ];

    public function penghuni()
    {
        return $this->belongsTo(Penghuni::class);
    }
}