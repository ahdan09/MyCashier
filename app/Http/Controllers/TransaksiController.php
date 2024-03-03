<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Product;
use App\Models\Pelanggan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaksis = Transaksi::all();
        $pelanggans = Pelanggan::all();
        return view('Transaksi.index',compact('transaksis','pelanggans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();
        $pelanggans = Pelanggan::all();
        return view('Transaksi.create',compact('products','pelanggans'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function getProductDetails($id)
    {
        $product = Product::find($id);
        return response()->json($product);
    }

    public function store(Request $request)
    {
        $kasir = Auth::user()->name;
        $validate = $request->validate([
            'id_pelanggan' => 'required|exists:pelanggans,id',
            'total_pesanan' => 'required|numeric',
            'bayar' => 'required|numeric',
        ]);

        $transaksi = new Transaksi();
        $transaksi->kasir = $kasir;
        $transaksi->total_harga = $request->total_pesanan;
        $transaksi->id_pelanggan = $request->id_pelanggan;
        $transaksi->bayar = $request->bayar;
        $transaksi->nota = mt_rand(1000000000000000, 9999999999999999);

        $transaksi->save();

        return redirect()->route('Transaksi.index')->with('success','Transaksi berhasil');
    }


    /**
     * Display the specified resource.
     */
    public function show(Transaksi $transaksi)
    {
        $products = Product::all();
        $pelanggans = Pelanggan::all();
        return view ('Transaksi.show',compact('products','pelanggans'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }
}
