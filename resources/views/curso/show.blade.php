@extends('layouts.app')

@section('template_title')
    {{ $curso->name ?? __('Show') . " " . __('Curso') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Curso</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('cursos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Codigo Curso:</strong>
                                    {{ $curso->codigo_curso }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Curso:</strong>
                                    {{ $curso->curso }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Jornada:</strong>
                                    {{ $curso->jornada }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Horario:</strong>
                                    {{ $curso->horario }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Intensidad:</strong>
                                    {{ $curso->intensidad }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fecha Inicio:</strong>
                                    {{ $curso->fecha_inicio }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Municipio:</strong>
                                    {{ $curso->municipio }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Direccion:</strong>
                                    {{ $curso->direccion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Formacion:</strong>
                                    {{ $curso->formacion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Centro:</strong>
                                    {{ $curso->centro }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Descripcion:</strong>
                                    {{ $curso->descripcion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Nombre Grupo:</strong>
                                    {{ $curso->nombre_grupo }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Estado:</strong>
                                    {{ $curso->estado }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Rol:</strong>
                                    {{ $curso->rol }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fecharegistro:</strong>
                                    {{ $curso->fechaRegistro }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
