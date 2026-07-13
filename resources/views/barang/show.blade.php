@extends('layouts.app')

@section('template_title')
    {{ $barang->name ?? __('Show') . " " . __('Barang') }}
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
                                    <strong>Deskripsi:</strong>
                                    {{ $barang->deskripsi }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Harga:</strong>
                                    {{ $barang->harga }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
