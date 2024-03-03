@extends('Layout.master')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold fs-6 mb-5">Detail Transaksi</h5>
            <div class="card" style="background: #f3f4f6">
                <div class="card-body">

                </div>
            </div>
            <a class="btn btn-primary" href="{{ route('Transaksi.index') }}" role="button">Kembali</a>
        </div>
    </div>
</div>
@endsection
