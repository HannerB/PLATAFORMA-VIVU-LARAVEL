@extends('layouts.app')

@section('template_title')
    {{ $asignarMunicipio->name ?? __('Show') . " " . __('Asignar Municipio') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Asignar Municipio</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('asignar-municipios.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Municipio:</strong>
                                    {{ $asignarMunicipio->municipio }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Responsable:</strong>
                                    {{ $asignarMunicipio->id_responsable }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Periodo:</strong>
                                    {{ $asignarMunicipio->periodo }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Estado:</strong>
                                    {{ $asignarMunicipio->estado }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fecha Registro:</strong>
                                    {{ $asignarMunicipio->fecha_registro }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
