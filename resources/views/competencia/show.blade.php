@extends('layouts.app')

@section('template_title')
    {{ $competencia->name ?? __('Show') . " " . __('Competencia') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Competencia</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('competencias.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Nombres:</strong>
                                    {{ $competencia->nombres }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Apellidos:</strong>
                                    {{ $competencia->apellidos }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Sexo:</strong>
                                    {{ $competencia->sexo }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Correo:</strong>
                                    {{ $competencia->correo }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Tipodocumento:</strong>
                                    {{ $competencia->tipodocumento }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Documento:</strong>
                                    {{ $competencia->documento }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fechanacimiento:</strong>
                                    {{ $competencia->fechaNacimiento }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Municipio:</strong>
                                    {{ $competencia->municipio }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Telefono:</strong>
                                    {{ $competencia->telefono }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Poblacion:</strong>
                                    {{ $competencia->poblacion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Ocupacion:</strong>
                                    {{ $competencia->ocupacion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fecharegistro:</strong>
                                    {{ $competencia->fechaRegistro }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
