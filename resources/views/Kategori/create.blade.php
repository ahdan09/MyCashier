@extends('Layout.master')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold fs-6 mb-5">Tambah Kategori</h5>
                <form method="POST" action="{{ route('categori.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="nama_categori" class="form-label shadow-md text-muted">Nama Kategori</label>
                        <input type="text" class="form-control @error('nama_categori') is-invalid @enderror" id="nama_categori"
                            name="nama_categori" aria-describedby="emailHelp" :value="old('nama_categori')" required>
                        @error('nama_categori')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn bg-black text-white mt-1">Simpan</button>
                    <a class="btn mt-1 mx-2 text-white" href="{{ route('categori.index') }}" role="button"
                        style="background-color: #dc3545">Batal</a>
                </form>
            </div>
        </div>
    </div>
@endsection

