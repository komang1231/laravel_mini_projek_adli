@extends('layouts.app')

@section('template_title')
    Barang
@endsection

@section('content')
    <div class="container-fluid">



        <div class="card border-0 shadow-sm">

            <div class="card-header bg-white border-0 py-3">

                <h4 class="fw-bold mb-1">
                    Barang
                </h4>

                <small class="text-muted">
                    Kelola seluruh data barang.
                </small>

            </div>

            <div class="card-body">

                <div class="row mb-4 align-items-center">

                    <div class="col-md-1">

                        <x-sort :route="route('barangs.index')" />

                    </div>

                    <div class="col-md-4">

                        <x-searchbar :route="route('barangs.index')" placeholder="Cari Barang..." />

                    </div>

                    <a href="{{ route('barangs.trash') }}" class="btn btn-dark col-md-2 gap-1">

                        <i class="bi bi-trash3"></i>

                        Trash

                    </a>

                    <div class="col-md-5 text-end">

                        <a href="{{ route('barangs.create') }}" class="btn btn-primary">

                            <i class="bi bi-plus-lg"></i>

                            Tambah Barang

                        </a>

                    </div>

                </div>

                <div class="table-responsive">

                    <table class="table table-hover align-middle">

                        <thead class="table-light">

                            <tr>

                                <th width="70">No</th>

                                <th>Kode Barang</th>

                                <th>Nama Barang</th>

                                <th>Kategori</th>

                                <th>Harga</th>

                                <th>Stok</th>

                                <th width="220" class="text-center">
                                    Aksi
                                </th>

                            </tr>

                        </thead>

                        <tbody>

                            @forelse ($barangs as $barang)
                                <tr>

                                    <td>{{ ++$i }}</td>

                                    <td>{{ $barang->kode_barang }}</td>

                                    <td>{{ $barang->nama_barang }}</td>

                                    <td>{{ $barang->kategori->nama_kategori ?? 'Tidak ada kategori' }}</td>

                                    <td>
                                        Rp {{ number_format($barang->harga, 0, ',', '.') }}
                                    </td>
                                    <td>{{ $barang->stok }}</td>

                                    <td>

                                        <div class="d-flex justify-content-center gap-2">

                                            <a href="{{ route('barangs.show', $barang->id) }}"
                                                class="btn btn-secondary btn-sm" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Lihat">

                                                <i class="bi bi-eye"></i>

                                            </a>

                                            <a href="{{ route('barangs.edit', $barang->id) }}"
                                                class="btn btn-warning btn-sm" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Edit">

                                                <i class="bi bi-pencil-square"></i>

                                            </a>

                                            <form action="{{ route('barangs.destroy', $barang->id) }}" method="POST"
                                                class="delete-form">

                                                @csrf
                                                @method('DELETE')

                                                <button type="button" class="btn btn-danger btn-sm btn-delete"
                                                    data-bs-toggle="modal" data-bs-target="#deleteModal"
                                                    data-barang="{{ $barang->nama_barang }}">

                                                    <i class="bi bi-trash"></i>

                                                </button>

                                            </form>

                                        </div>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="6" class="text-center py-5">

                                        <i class="bi bi-inbox fs-1 text-secondary"></i>

                                        <br><br>

                                        <span class="text-muted">

                                            Belum ada data barang.

                                        </span>

                                    </td>

                                </tr>
                            @endforelse

                        </tbody>

                    </table>

                </div>

                <div class="d-flex justify-content-end">

                    {!! $barangs->withQueryString()->links() !!}

                </div>

            </div>

        </div>

    </div>

    <!-- MODAL DELETE -->

    <div class="modal fade" id="deleteModal" tabindex="-1">

        <div class="modal-dialog modal-dialog-centered">

            <div class="modal-content">

                <div class="modal-header">

                    <h5 class="modal-title">

                        Hapus Barang

                    </h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>

                </div>

                <div class="modal-body">

                    Apakah kamu yakin ingin menghapus

                    <strong id="deleteBarangName"></strong> ?

                </div>

                <div class="modal-footer">

                    <button class="btn btn-secondary" data-bs-dismiss="modal">

                        Batal

                    </button>

                    <button type="button" class="btn btn-danger" id="confirmDelete">

                        Ya, Hapus

                    </button>

                </div>

            </div>

        </div>

    </div>
@endsection
