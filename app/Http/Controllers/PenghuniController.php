<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penghuni;
use App\Models\Kamar;

class PenghuniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $penghunis = Penghuni::with('kamar')->get();

       return view('penghuni.index', compact('penghunis'));
    }

    /**
     * Show the form for creating a new resource.
     */
   public function create()
    {
         $kamars = Kamar::where('status', 'kosong')->get();

    return view('penghuni.create', compact('kamars'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
        {
            $request->validate([
                'nama' => 'required',
                'no_hp' => 'required',
                'alamat' => 'required',
                'kamar_id' => 'required',
            ]);

            Penghuni::create([
                'nama' => $request->nama,
                'no_hp' => $request->no_hp,
                'alamat' => $request->alamat,
                'kamar_id' => $request->kamar_id,
            ]);

            Kamar::where('id', $request->kamar_id)
                ->update([
                    'status' => 'terisi'
                ]);

            return redirect('/penghuni')
                ->with('success', 'Data penghuni berhasil ditambahkan');
        }

    /**
     * Display the specified resource.
     */
    public function show(Penghuni $penghuni)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penghuni $penghuni)
    {
           $kamars = Kamar::all();

    return view('penghuni.edit', compact(
        'penghuni',
        'kamars'
    ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penghuni $penghuni)
    {
            $request->validate([
        'nama' => 'required',
        'no_hp' => 'required',
        'alamat' => 'required',
        'kamar_id' => 'required',
    ]);

    $penghuni->update([
        'nama' => $request->nama,
        'no_hp' => $request->no_hp,
        'alamat' => $request->alamat,
        'kamar_id' => $request->kamar_id,
    ]);

    return redirect('/penghuni')
        ->with('success', 'Data penghuni berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penghuni $penghuni)
    {
         $kamar = $penghuni->kamar;

    $penghuni->delete();

    if ($kamar) {
        $kamar->update([
            'status' => 'kosong'
        ]);
    }

    return redirect('/penghuni')
        ->with('success', 'Data penghuni berhasil dihapus');
    }
}
