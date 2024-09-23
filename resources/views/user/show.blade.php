@extends('layouts.app')

@section('template_title')
    {{ $user->name ?? __('Show') . " " . __('User') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} User</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('users.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Nombres:</strong>
                                    {{ $user->nombres }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Apellidos:</strong>
                                    {{ $user->apellidos }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Sexo:</strong>
                                    {{ $user->sexo }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Tipodocumento:</strong>
                                    {{ $user->tipodocumento }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Documento:</strong>
                                    {{ $user->documento }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fechanacimiento:</strong>
                                    {{ $user->fechaNacimiento }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Telefono:</strong>
                                    {{ $user->telefono }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Tipopoblacion:</strong>
                                    {{ $user->tipoPoblacion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Centro:</strong>
                                    {{ $user->centro }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Municipio:</strong>
                                    {{ $user->municipio }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Email:</strong>
                                    {{ $user->email }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Rol:</strong>
                                    {{ $user->rol }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fecharegistro:</strong>
                                    {{ $user->fechaRegistro }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fecha Sesion:</strong>
                                    {{ $user->fecha_sesion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Img:</strong>
                                    {{ $user->img }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Tipo Archivo:</strong>
                                    {{ $user->tipo_archivo }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
