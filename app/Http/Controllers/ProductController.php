<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Categori;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = product::paginate(10);
        return view ('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categoris = Categori::all();
        return view ('product.create',compact('categoris'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request -> validate([
            'id_categori' => 'required',
            'name' => 'required|string',
            'harga_beli' => 'required|numeric',
            'harga_jual' => 'required|numeric',
            'stock' => 'required|numeric',
        ]);

        Product::create($validateData);
        return redirect()->route('product.index')->with('success','Berhasil membuat product baru');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('product.show',[
            'product' => $product,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categoris = Categori::all();
        return view ('product.edit',compact('product','categoris'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validateData = $request -> validate([
            'id_categori' => 'required',
            'name' => 'required|string',
            'harga_beli' => 'required|numeric',
            'harga_jual' => 'required|numeric',
            'stock' => 'required|numeric',
        ]);

        $product->update($validateData);
        return redirect()->route('product.index')->with('success','Berhasil memperbarui product');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('product.index')->with('success', "Berhasil menghapus data product!");

    }
}
