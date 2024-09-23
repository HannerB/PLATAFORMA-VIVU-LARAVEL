@extends('layouts.app')

@section('template_title')
    {{ $poa->name ?? __('Show') . " " . __('Poa') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Poa</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('poas.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Poa:</strong>
                                    {{ $poa->id_poa }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Asignar Municipios:</strong>
                                    {{ $poa->id_asignar_municipios }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Nombre Poa:</strong>
                                    {{ $poa->Nombre_Poa }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Persona Enlace:</strong>
                                    {{ $poa->Persona_Enlace }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Telefono Enlace:</strong>
                                    {{ $poa->Telefono_Enlace }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Correo Enlace:</strong>
                                    {{ $poa->Correo_Enlace }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Poblacion:</strong>
                                    {{ $poa->Poblacion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Ocupacion Productiva:</strong>
                                    {{ $poa->Ocupacion_Productiva }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fecha Registro:</strong>
                                    {{ $poa->fecha_registro }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Estado:</strong>
                                    {{ $poa->estado }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
