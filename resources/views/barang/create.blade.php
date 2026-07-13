@extends('layouts.app')

@section('template_title')
    Tambah Barang
@endsection

@section('content')

<div class="container-fluid">

    <div class="card border-0 shadow-sm">

        <div class="card-header bg-white border-0 py-3">

            <h4 class="fw-bold mb-1">
                Tambah Barang
            </h4>

            <small class="text-muted">
                Tambahkan data barang baru.
            </small>

        </div>

        <div class="card-body">

            <form
                method="POST"
                action="{{ route('barangs.store') }}"
                enctype="multipart/form-data">

                @csrf

                @include('barang.form')

            </form>

        </div>

    </div>

</div>

@endsection