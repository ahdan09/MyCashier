@extends('Layout.master')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold fs-6 mb-5">Tambah Produk</h5>
                <form method="POST" action="{{ route('product.update', $product->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="name" class="form-label shadow-md text-muted">Nama</label>
                        <div class="mb-3">
                            <select class="form-select" name="id_categori" id="id_categori">
                                @foreach ($categoris as $categori)
                                    <option value="{{ $categori->id }}">{{ $categori->nama_categori }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="name" class="form-label shadow-md text-muted">Nama</label>
                        <input type="text" class="form-control" id="name" name="name"
                            aria-describedby="emailHelp" value="{{ $product->name }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="harga_beli" class="form-label shadow-md text-muted">Harga Beli</label>
                        <input type="number" class="form-control" id="harga_beli" name="harga_beli"
                            aria-describedby="emailHelp" value="{{ $product->harga_beli }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="harga_jual" class="form-label shadow-md text-muted">Harga Jual</label>
                        <input type="number" class="form-control" id="harga_jual" name="harga_jual"
                            aria-describedby="emailHelp" value="{{ $product->harga_jual }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="stock" class="form-label shadow-md text-muted">stok</label>
                        <input type="number" class="form-control" id="stock" name="stock"
                            aria-describedby="emailHelp" value="{{ $product->stock }}" required>
                    </div>
                    <button type="submit" class="btn bg-black text-white mt-1">Simpan</button>
                    <a class="btn mt-1 mx-2 text-white" href="{{ route('product.index') }}" role="button"
                        style="background-color: #dc3545">Batal</a>
                </form>
            </div>
        </div>
    </div>
@endsection
