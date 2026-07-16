@extends('layouts.app')

@section('template_title', 'Ubah Password')

@section('content')

<div class="container-fluid">

    <div class="row justify-content-center">

        <div class="col-lg-6">

            <div class="card border-0 shadow-sm">

                <div class="card-header bg-white">

                    <h4 class="fw-bold mb-0">

                        Ubah Password

                    </h4>

                </div>

                <div class="card-body">

                    <form action="{{ route('profile.password.update') }}" method="POST">

                        @csrf
                        @method('PUT')

                        <div class="mb-3">

                            <label class="form-label">

                                Password Lama

                            </label>

                            <input
                                type="password"
                                name="current_password"
                                class="form-control @error('current_password') is-invalid @enderror">

                            @error('current_password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <div class="mb-3">

                            <label class="form-label">

                                Password Baru

                            </label>

                            <input
                                type="password"
                                name="password"
                                class="form-control @error('password') is-invalid @enderror">

                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <div class="mb-4">

                            <label class="form-label">

                                Konfirmasi Password Baru

                            </label>

                            <input
                                type="password"
                                name="password_confirmation"
                                class="form-control">

                        </div>

                        <div class="d-flex justify-content-end gap-2">

                            <a href="{{ route('profile') }}" class="btn btn-secondary">

                                Batal

                            </a>

                            <button class="btn btn-primary">

                                Simpan Password

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection