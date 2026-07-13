@extends('layouts.app')

@section('template_title')
    {{ $kategori->name ?? __('Show') . " " . __('Kategori') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Kategori</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('kategoris.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Kode Kategori:</strong>
                                    {{ $kategori->kode_kategori }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Nama Kategori:</strong>
                                    {{ $kategori->nama_kategori }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
