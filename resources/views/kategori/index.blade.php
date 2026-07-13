@extends('layouts.app')

@section('template_title')
    Kategori
@endsection

@section('content')
    <div class="container-fluid">

        @if (session('success'))
            <div class="toast-container position-fixed top-0 end-0 p-3">

                <div id="successToast" class="toast align-items-center text-bg-success border-0" role="alert">

                    <div class="d-flex">

                        <div class="toast-body">

                            <i class="bi bi-check-circle-fill me-2"></i>

                            {{ session('success') }}

                        </div>

                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast">
                        </button>

                    </div>

                </div>

            </div>
        @endif

        <div class="card border-0 shadow-sm">

            <div class="card-header bg-white border-0 py-3">

                <h4 class="fw-bold mb-1">
                    Kategori
                </h4>

                <small class="text-muted">
                    Kelola seluruh data kategori.
                </small>

            </div>

            <div class="card-body">

                <div class="row mb-4 align-items-center">

                    <div class="col-md-4">

                        @include('components.searchbar', ['route' => route('kategoris.index'), 'placeholder' => 'Cari kategori...'])

                    </div>

                    <div class="col-md-8 text-end">

                        <a href="{{ route('kategoris.create') }}" class="btn btn-primary">

                            <i class="bi bi-plus-lg"></i>

                            Tambah Kategori

                        </a>

                    </div>

                </div>

                <div class="table-responsive">

                    <table class="table table-hover align-middle">

                        <thead class="table-light">

                            <tr>

                                <th width="70">No</th>

                                <th>Kode Kategori</th>

                                <th>Nama Kategori</th>

                                <th width="220" class="text-center">
                                    Aksi
                                </th>

                            </tr>

                        </thead>

                        <tbody>

                            @forelse ($kategoris as $kategori)
                                <tr>

                                    <td>{{ ++$i }}</td>

                                    <td>{{ $kategori->kode_kategori }}</td>

                                    <td>{{ $kategori->nama_kategori }}</td>

                                    <td>

                                        <div class="d-flex justify-content-center gap-2">

                                            <a href="{{ route('kategoris.show', $kategori->id) }}"
                                                class="btn btn-secondary btn-sm" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Lihat">

                                                <i class="bi bi-eye"></i>

                                            </a>

                                            <a href="{{ route('kategoris.edit', $kategori->id) }}"
                                                class="btn btn-warning btn-sm" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Edit">

                                                <i class="bi bi-pencil-square"></i>

                                            </a>

                                            <form action="{{ route('kategoris.destroy', $kategori->id) }}" method="POST"
                                                class="delete-form">

                                                @csrf
                                                @method('DELETE')

                                                <button type="button" class="btn btn-danger btn-sm btn-delete"
                                                    data-bs-toggle="modal" data-bs-target="#deleteModal"
                                                    data-barang="{{ $kategori->nama_kategori }}">

                                                    <i class="bi bi-trash"></i>

                                                </button>

                                            </form>

                                        </div>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="4" class="text-center py-5">

                                        <i class="bi bi-inbox fs-1 text-secondary"></i>

                                        <br><br>

                                        <span class="text-muted">

                                            Belum ada data kategori.

                                        </span>

                                    </td>

                                </tr>
                            @endforelse

                        </tbody>

                    </table>

                </div>

                <div class="d-flex justify-content-end">

                    {!! $kategoris->withQueryString()->links() !!}

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

                        Hapus Kategori

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
