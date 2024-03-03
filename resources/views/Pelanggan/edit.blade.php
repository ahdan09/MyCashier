@extends('Layout.master')

@section('content')
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title fw-semibold fs-4 mb-4">Edit Pelanggan</h5>
                    <form method="POST" action="{{ route('pelanggan.update', $pelanggan->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="nama_pelanggan" class="form-label shadow-md text-muted">Nama</label>
                            <input type="text" class="form-control @error('nama_pelanggan') is-invalid @enderror" id="nama_pelanggan"
                                name="nama_pelanggan" aria-describedby="emailHelp" value="{{ $pelanggan->nama_pelanggan }}" autofocus>
                            @error('nama_pelanggan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="alamat" class="form-label shadow-md text-muted">Alamat</label>
                            <textarea type="text" class="form-control @error('address') is-invalid @enderror" id="alamat" name="alamat">{{ $pelanggan->alamat }}</textarea>
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="telepon" class="form-label shadow-md text-muted">Telepon</label>
                            <input type="number" class="form-control @error('telepon') is-invalid @enderror" id="telepon"
                                name="telepon" value="{{ $pelanggan->telepon }}">
                            @error('telepon')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn bg-black text-white mt-1">Simpan</button>
                        <a class="btn mt-1 mx-2 text-white" href="{{ route('pelanggan.index') }}" role="button"
                            style="background-color: #dc3545">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
