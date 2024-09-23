@extends('layouts.app')

@section('template_title')
    {{ $cursosDetalle->name ?? __('Show') . " " . __('Cursos Detalle') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Cursos Detalle</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('cursos-detalles.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Cursos Detalle:</strong>
                                    {{ $cursosDetalle->id_cursos_detalle }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Users:</strong>
                                    {{ $cursosDetalle->id_users }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Gestion Cursos:</strong>
                                    {{ $cursosDetalle->id_gestion_cursos }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fecha Registro:</strong>
                                    {{ $cursosDetalle->fecha_registro }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Modo Documento:</strong>
                                    {{ $cursosDetalle->modo_Documento }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Docuemnto:</strong>
                                    {{ $cursosDetalle->id_Docuemnto }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
