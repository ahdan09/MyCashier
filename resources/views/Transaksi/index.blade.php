@extends('Layout.master')

@section('content')
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="card bg-white">
                <div class="card-body">
                    <a href="{{ route('Transaksi.create') }}" class="btn btn-primary mb-4" role="button">
                        <i class="fa-solid fa-cash-register" style="margin-right: 8px"></i>Tambah
                    </a>
                    <h5 class="card-title fw-bolder fs-6 mb-4">Transaksi</h5>
                    <div class="card" style="background: #f3f4f6">
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Pelangan</th>
                                        <th scope="col">Petugas</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Jumlah Pembayaran</th>
                                        <th scope="col">Waktu</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transaksis as $transaksi)
                                        <tr>
                                            <th>{{ $loop->iteration }}</th>
                                            <td>{{ $transaksi->pelanggan->nama_pelanggan }}</td>
                                            <td>{{ $transaksi->kasir }}</td>
                                            <td>Rp{{ number_format($transaksi->total_harga, 0, ',', '.') }},-</td>
                                            <td>Rp{{ number_format($transaksi->bayar, 0, ',', '.') }},-</td>
                                            <td>{{ $transaksi->created_at->format('H:i, d M y') }}</td>
                                            <td class="d-flex">
                                                <a class="btn btn-warning px-2 py-1" href="#" role="button"><i
                                                        class="ti ti-eye"></i></a>
                                                <form action="#" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn px-2 py-1 mx-2 text-white"
                                                        style="background-color: #dc3545"type="submit"
                                                        onclick="confirmDelete(event)"><i class="ti ti-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
@endsection
