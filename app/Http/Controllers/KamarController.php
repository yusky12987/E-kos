<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use Illuminate\Http\Request;

class KamarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index()
    {
    $kamars = Kamar::all();
    return view('kamar.index', compact('kamars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kamar.create');
    }
    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
    {
        $request->validate([
            'nomor_kamar' => 'required',
            'harga' => 'required|numeric',
            'lantai' => 'required',
            'status' => 'required',
        ]);

        Kamar::create([
            'nomor_kamar' => $request->nomor_kamar,
            'harga' => $request->harga,
            'lantai' => $request->lantai,
            'status' => $request->status,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect('/kamar')
            ->with('success', 'Data kamar berhasil ditambahkan');
    }
    /**
     * Display the specified resource.
     */
    public function show(Kamar $kamar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kamar $kamar)
    {
        
        return view('kamar.edit', compact('kamar'));
    }
    /**
     * Update the specified resource in storage.
     */
 public function update(Request $request, Kamar $kamar)
    {
        $request->validate([
            'nomor_kamar' => 'required',
            'harga' => 'required|numeric',
            'lantai' => 'required',
            'status' => 'required',
        ]);

        $kamar->update([
            'nomor_kamar' => $request->nomor_kamar,
            'harga' => $request->harga,
            'lantai' => $request->lantai,
            'status' => $request->status,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect('/kamar')
            ->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kamar $kamar)
    {
       $kamar->delete();

    return redirect('/kamar')
        ->with('success', 'Data berhasil dihapus');
    }
}
