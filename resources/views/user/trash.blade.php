@extends('layouts.app')

@section('template_title')
    Trash Users
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
                    Trash Users
                </h4>

                <small class="text-muted">
                    Data user yang telah dihapus.
                </small>

            </div>

            <div class="card-body">

                <div class="row mb-2 align-items-center">
                    <div class="col-md-7">
                        @include('components.searchbar', [
                            'route' => route('users.trash'),
                            'placeholder' => 'Cari user...',
                        ])
                    </div>

                    <div class="d-flex justify-content-end col-md-5 text-end">
                        <a href="{{ route('users.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i>
                            Kembali
                        </a>
                    </div>
                </div>

                <div class="table-responsive">

                    <table class="table table-hover align-middle">

                        <thead class="table-light">
                            <tr>
                                <th width="70">No</th>
                                <th>Kode User</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>No Hp</th>
                                <th width="220" class="text-center">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($users as $user)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $user->kode_user }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td>{{ $user->no_hp }}</td>
                                    <td>
                                        <div class="d-flex justify-content-center gap-2">
                                            <form action="{{ route('users.restore', $user->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button class="btn btn-success btn-sm" title="Pulihkan">
                                                    <i class="bi bi-arrow-counterclockwise"></i>
                                                </button>
                                            </form>

                                            <form action="{{ route('users.forceDelete', $user->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm" title="Hapus permanen">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center py-5">
                                        <i class="bi bi-trash3 fs-1 text-secondary"></i>
                                        <br><br>
                                        <span class="text-muted">
                                            Tidak ada data di Trash.
                                        </span>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>

                    </table>

                </div>

                <div class="d-flex justify-content-end mt-3">
                    {{ $users->links() }}
                </div>

            </div>

        </div>

    </div>
@endsection
