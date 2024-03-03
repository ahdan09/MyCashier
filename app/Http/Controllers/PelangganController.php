<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pelanggans = Pelanggan::paginate(10);
        return view('Pelanggan.index',compact('pelanggans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Pelanggan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ValidateData = $request->validate ([
            'nama_pelanggan' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
        ]);
        Pelanggan::create($ValidateData);
        return redirect()->route('pelanggan.index')->with('success','Berhasil membuat pelanggan baru');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pelanggan $pelanggan)
    {
        return view('Pelanggan.edit',compact('pelanggan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pelanggan $pelanggan)
    {
        $ValidateData = $request->validate ([
            'nama_pelanggan' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
        ]);

        $pelanggan->update($ValidateData);
        return redirect()->route('pelanggan.index')->with('success','Berhasil memperbarui pelanggan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->delete();
        return redirect()->route('pelanggan.index')->with('success','Berhasil menghapus data pelanggan');
    }
}
