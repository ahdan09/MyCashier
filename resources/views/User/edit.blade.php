@extends('Layout.master')

@section('content')
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title fw-semibold fs-4 mb-4">Edit User</h5>
                    <form method="POST" action="{{ route('user.update', $user->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="name" class="form-label shadow-md text-muted">Nama</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" aria-describedby="emailHelp" value="{{ $user->name }}" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="email" class="form-label shadow-md text-muted">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                name="email" value="{{ $user->email }}" readonly>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="alamat" class="form-label shadow-md text-muted">Alamat</label>
                            <textarea type="text" class="form-control @error('address') is-invalid @enderror" id="alamat" name="alamat">{{ $user->alamat }}</textarea>
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="telepon" class="form-label shadow-md text-muted">Telepon</label>
                            <input type="number" class="form-control @error('telepon') is-invalid @enderror" id="telepon"
                                name="telepon" value="{{ $user->telepon }}">
                            @error('telepon')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="role" class="form-label shadow-md text-muted">Role</label>
                            <select name="role" id="role" class="form-select">
                                @foreach ($roleOption as $value => $label)
                                    <option value="{{ $value }}">{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="exampleInputPassword1" class="form-label shadow-md text-muted">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="exampleInputPassword1" name="password" required :value="old('password')">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn bg-black text-white mt-1">Simpan</button>
                        <a class="btn mt-1 mx-2 text-white" href="{{ route('user.index') }}" role="button"
                            style="background-color: #dc3545">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
