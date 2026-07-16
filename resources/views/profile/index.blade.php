@extends('layouts.app')

@section('template_title', 'Profile')

@section('content')

<div class="container-fluid">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card border-0 shadow-sm">

                <div class="card-body p-5">

                    <div class="text-center">

                        <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=0D6EFD&color=fff&size=180"
                            class="rounded-circle shadow mb-3">

                        <h3 class="fw-bold mb-1">

                            {{ $user->name }}

                        </h3>

                        <span class="badge bg-primary">

                            {{ ucfirst($user->role) }}

                        </span>

                    </div>

                    <hr class="my-4">

                    <div class="row gy-4">

                        <div class="col-md-6">

                            <label class="text-muted small">

                                Kode User

                            </label>

                            <div class="fw-semibold">

                                {{ $user->kode_user }}

                            </div>

                        </div>

                        <div class="col-md-6">

                            <label class="text-muted small">

                                Email

                            </label>

                            <div class="fw-semibold">

                                {{ $user->email }}

                            </div>

                        </div>

                        <div class="col-md-6">

                            <label class="text-muted small">

                                Nomor HP

                            </label>

                            <div class="fw-semibold">

                                {{ $user->no_hp ?? '-' }}

                            </div>

                        </div>

                        <div class="col-md-6">

                            <label class="text-muted small">

                                Bergabung Sejak

                            </label>

                            <div class="fw-semibold">

                                {{ $user->created_at->format('d F Y') }}

                            </div>

                        </div>

                    </div>

                    <hr class="my-4">

                    <div class="d-flex justify-content-end gap-2">

                        <a href="{{ route('profile.edit') }}" class="btn btn-warning">

                            <i class="bi bi-pencil-square me-2"></i>

                            Edit Profile

                        </a>

                        <a href="{{ route('profile.password') }}" class="btn btn-outline-secondary">

                            <i class="bi bi-key me-2"></i>

                            Ubah Password

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection