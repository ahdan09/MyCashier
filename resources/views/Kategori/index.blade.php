@extends('Layout.master')

@section('content')
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="card bg-white">
                <div class="card-body">
                    <a href="{{ route('categori.create') }}" class="btn btn-primary mb-4" role="button">
                        <i class="fa-solid fa-cash-register" style="margin-right: 8px"></i>Tambah
                    </a>
                    <h5 class="card-title fw-bolder fs-6 mb-4">Transaksi</h5>
                    <div class="card" style="background: #f3f4f6">
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Kategori</th>
                                        <th scope="col"></th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categoris as $categori)
                                        <tr>
                                            <th>{{ $loop->iteration }}</th>
                                            <td>{{ $categori->nama_categori }}</td>
                                            <td></td>
                                            <td class="d-flex">
                                                <form action="{{ route('categori.destroy', $categori->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn px-2 py-1 text-white mx-2"
                                                        style="background-color: #dc3545"type="submit"
                                                        onclick="confirmktgri(event)"><i class="ti ti-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $categoris->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
    <script>
        function confirmktgri(event) {
            event.preventDefault();

            console.log("Button clicked");
            Swal.fire({
                title: 'Apa kamu yakin?',
                text: 'Anda tidak akan dapat memulihkan kategori ini!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batalkan'
            }).then((result) => {
                if (result.isConfirmed) {
                    event.target.closest('form').submit();
                }
            });
        }
    </script>
@endsection
