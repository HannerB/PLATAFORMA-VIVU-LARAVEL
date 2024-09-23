@extends('layouts.app')

@section('template_title')
    {{ $noInscritosSofiaplu->name ?? __('Show') . " " . __('No Inscritos Sofiaplu') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} No Inscritos Sofiaplu</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('no-inscritos-sofiaplus.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Sofiaplus:</strong>
                                    {{ $noInscritosSofiaplu->id_sofiaPlus }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Pais Nacimiento:</strong>
                                    {{ $noInscritosSofiaplu->pais_nacimiento }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Departamento Nacimiento:</strong>
                                    {{ $noInscritosSofiaplu->departamento_nacimiento }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Municipio Nacimiento:</strong>
                                    {{ $noInscritosSofiaplu->municipio_nacimiento }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fecha Exped Cedula:</strong>
                                    {{ $noInscritosSofiaplu->fecha_exped_cedula }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Pais Cedula:</strong>
                                    {{ $noInscritosSofiaplu->pais_cedula }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Departamento Cedula:</strong>
                                    {{ $noInscritosSofiaplu->departamento_cedula }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Municipio Cedula:</strong>
                                    {{ $noInscritosSofiaplu->municipio_cedula }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Users:</strong>
                                    {{ $noInscritosSofiaplu->id_users }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Registro Sofia:</strong>
                                    {{ $noInscritosSofiaplu->registro_sofia }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Curso Id:</strong>
                                    {{ $noInscritosSofiaplu->curso_id }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
