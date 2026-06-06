<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;
use App\Models\Penghuni;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penghunis = Penghuni::with([
            'kamar',
            'pembayaran'
        ])->get();

        return view('pembayaran.index', compact('penghunis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $penghunis = Penghuni::with('kamar')->get();

        return view('pembayaran.create', compact('penghunis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $penghuni = Penghuni::with('kamar')
        ->find($request->penghuni_id);

    $hargaKamar = $penghuni->kamar->harga;

    $totalBayarSebelumnya = Pembayaran::where(
        'penghuni_id',
        $request->penghuni_id
    )->sum('jumlah_bayar');

    $totalBayarSekarang =
        $totalBayarSebelumnya +
        $request->jumlah_bayar;

    $status =
        $totalBayarSekarang >= $hargaKamar
        ? 'lunas'
        : 'belum';

        Pembayaran::create([
        'penghuni_id' => $request->penghuni_id,
        'jumlah_bayar' => $request->jumlah_bayar,
        'tanggal_bayar' => $request->tanggal_bayar,
        'status' => $status,
        'keterangan' => $request->keterangan,
    ]);

        return redirect('/pembayaran')
            ->with('success', 'Pembayaran berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pembayaran $pembayaran)
    {
        //
    }
}
