@extends('layouts.app')

@section('template_title')
    {{ $cursosSolicitado->name ?? __('Show') . " " . __('Cursos Solicitado') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Cursos Solicitado</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('cursos-solicitados.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Nombres:</strong>
                                    {{ $cursosSolicitado->nombres }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Apellidos:</strong>
                                    {{ $cursosSolicitado->apellidos }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Telefono:</strong>
                                    {{ $cursosSolicitado->telefono }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Correo:</strong>
                                    {{ $cursosSolicitado->correo }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Nombrecursosolicitado:</strong>
                                    {{ $cursosSolicitado->nombreCursoSolicitado }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fecharegistro:</strong>
                                    {{ $cursosSolicitado->fechaRegistro }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
