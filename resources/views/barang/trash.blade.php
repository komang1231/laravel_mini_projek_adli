@extends('layouts.app')

@section('template_title')
    Trash Barang
@endsection

@section('content')
    <div class="container-fluid">

        @if (session('success'))
            <div class="alert alert-success">

                {{ session('success') }}

            </div>
        @endif

        <div class="card border-0 shadow-sm">

            <div class="card-header bg-white border-0 py-3">

                <h4 class="fw-bold mb-1">

                    Trash Barang

                </h4>

                <small class="text-muted">

                    Data barang yang telah dihapus.

                </small>

            </div>

            <div class="card-body">

                <div class="d-flex justify-content-end mb-4">

                    <a href="{{ route('barangs.index') }}" class="btn btn-secondary">

                        <i class="bi bi-arrow-left"></i>

                        Kembali

                    </a>

                </div>

                <div class="table-responsive">

                    <table class="table table-hover align-middle">

                        <thead class="table-light">

                            <tr>

                                <th width="70">No</th>

                                <th>Kode Barang</th>

                                <th>Nama Barang</th>

                                <th>Harga</th>

                                <th width="220" class="text-center">

                                    Aksi

                                </th>

                            </tr>

                        </thead>

                        <tbody>

                            @forelse($barangs as $barang)
                                <tr>

                                    <td>{{ ++$i }}</td>

                                    <td>{{ $barang->kode_barang }}</td>

                                    <td>{{ $barang->nama_barang }}</td>

                                    <td>

                                        Rp {{ number_format($barang->harga, 0, ',', '.') }}

                                    </td>

                                    <td>

                                        <div class="d-flex justify-content-center gap-2">

                                            <form action="{{ route('barangs.restore', $barang->id) }}" method="POST">

                                                @csrf
                                                @method('PUT')

                                                <button class="btn btn-success btn-sm">

                                                    <i class="bi bi-arrow-counterclockwise"></i>

                                                </button>

                                            </form>

                                            <form action="{{ route('barangs.forceDelete', $barang->id) }}" method="POST">

                                                @csrf
                                                @method('DELETE')

                                                <button class="btn btn-danger btn-sm">

                                                    <i class="bi bi-trash"></i>

                                                </button>

                                            </form>

                                        </div>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="5" class="text-center py-5">

                                        <i class="bi bi-trash3 fs-1 text-secondary"></i>

                                        <br><br>

                                        Tidak ada data di Trash.

                                    </td>

                                </tr>
                            @endforelse

                        </tbody>

                    </table>

                </div>

                <div class="d-flex justify-content-end">

                    {{ $barangs->links() }}

                </div>

            </div>

        </div>

    </div>
@endsection
