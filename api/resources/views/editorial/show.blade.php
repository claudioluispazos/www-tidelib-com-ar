@extends('layouts.app')

@section('template_title')
    {{ $editorial->name ?? __('Show') . " " . __('Editorial') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Editorial</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('editorials.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Razon Social:</strong>
                                    {{ $editorial->razon_social }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Denominacion Social:</strong>
                                    {{ $editorial->denominacion_social }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Cuit:</strong>
                                    {{ $editorial->cuit }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Email:</strong>
                                    {{ $editorial->email }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Direccion:</strong>
                                    {{ $editorial->direccion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Sitio Web:</strong>
                                    {{ $editorial->sitio_web }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Facebook:</strong>
                                    {{ $editorial->facebook }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Instagram:</strong>
                                    {{ $editorial->instagram }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
