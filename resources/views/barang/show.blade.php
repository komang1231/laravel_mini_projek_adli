@extends('layouts.app')

@section('template_title')
    {{ $barang->name ?? __('Show') . ' ' . __('Barang') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Barang</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('barangs.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">

                        <div class="form-group mb-2 mb20">
                            <strong>Kode Barang:</strong>
                            {{ $barang->kode_barang }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Nama Barang:</strong>
                            {{ $barang->nama_barang }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Kategori:</strong>
                            {{ $barang->kategori->nama_kategori }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Deskripsi:</strong>
                            @if ($barang->deskripsi)
                                {{ $barang->deskripsi }}
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Harga:</strong>
                            Rp. {{ number_format($barang->harga, 0, ',', '.') }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Stok:</strong>
                            {{ $barang->stok }}
                        </div>
                        <hr>
                        <h5>Informasi Supplier</h5>
                        <div class="form-group mb-2 mb20">
                            <strong>Nama Supplier:</strong>
                            @if ($barang->supplier)
                                {{ $barang->supplier->nama_supplier }}
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>No HP Supplier:</strong>
                            @if ($barang->supplier)
                                {{ $barang->supplier->no_hp }}
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Alamat Supplier:</strong>
                            @if ($barang->supplier)
                                {{ $barang->supplier->alamat }}
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </div>

                        <hr>
                        

                        <div class="form-group mb-2 mb20">
                            <strong>Gambar:</strong>
                            @if ($barang->gambar)
                                <img src="{{ asset('storage/' . $barang->gambar) }}" alt="Gambar Barang"
                                    class="img-fluid mt-2" style="max-width: 200px;">
                            @else
                                <div class="border border-secondary d-flex align-items-center justify-content-center"
                                    style="width: 200px; height: 200px;">
                                    <p>Tidak ada gambar</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
