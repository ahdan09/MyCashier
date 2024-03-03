@extends('Layout.master')

@section('content')
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="card ">
                <div class="card-body">
                    <a href="{{ route('product.create') }}" class="btn btn-primary mb-4" role="button">
                        <i class="fa-solid fa-cart-plus" style="margin-right: 8px"></i>Tambah
                    </a>
                    <h5 class="card-title fw-bolder fs-6 mb-4">Data Product</h5>
                    <div class="card" style="background: #f3f4f6">
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Kategori</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Harga Beli</th>
                                        <th scope="col">Harga Jual</th>
                                        <th scope="col">Stok</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <th>{{ $loop->iteration }}</th>
                                            <th class="fw-normal">{{ $product->categori->nama_categori }}</th>
                                            <td>{{ $product->name }}</td>
                                            <td>Rp{{ number_format($product->harga_beli, 0, ',', '.') }},-</td>
                                            <td>Rp{{ number_format($product->harga_jual, 0, ',', '.') }},-</td>
                                            <td>{{ $product->stock }}</td>
                                            <td class="d-flex">
                                                <a class="btn btn-warning px-2 py-1"
                                                    href="{{ route('product.show', $product->id) }}" role="button"><i
                                                        class="ti ti-eye"></i></a>
                                                <a class="btn btn-primary px-2 py-1 mx-2"
                                                    href="{{ route('product.edit', $product->id) }}" role="button"><i
                                                        class="ti ti-pencil"></i></a>
                                                <form action="{{ route('product.destroy', $product->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn px-2 py-1 text-white"
                                                        style="background-color: #dc3545"type="submit"
                                                        onclick="confirmDel(event)"><i class="ti ti-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $products->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
    <script>
        function confirmDel(event) {
            event.preventDefault();

            console.log("Button clicked");
            Swal.fire({
                title: 'Apa kamu yakin?',
                text: 'Anda tidak akan dapat memulihkan produk ini!',
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
