<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kamar;
use App\Models\Pembayaran;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahKamar = \App\Models\Kamar::count();

    $kamarTerisi = \App\Models\Kamar::where('status', 'terisi')->count();

    $kamarKosong = \App\Models\Kamar::where('status', 'kosong')->count();

    $totalPemasukan = \App\Models\Pembayaran::sum('jumlah_bayar');

    return view('dashboard', compact(
        'jumlahKamar',
        'kamarTerisi',
        'kamarKosong',
        'totalPemasukan'
    ));
       
    }
}
