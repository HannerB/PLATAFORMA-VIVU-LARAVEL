@extends('layouts.app')

@section('template_title')
    {{ $gestionCurso->name ?? __('Show') . " " . __('Gestion Curso') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Gestion Curso</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('gestion-cursos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Gestion Cursos:</strong>
                                    {{ $gestionCurso->id_Gestion_Cursos }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Municipio Curso:</strong>
                                    {{ $gestionCurso->Municipio_Curso }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Centro Formacion:</strong>
                                    {{ $gestionCurso->Centro_Formacion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Nivel Formacion:</strong>
                                    {{ $gestionCurso->Nivel_Formacion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Nombre Curso:</strong>
                                    {{ $gestionCurso->Nombre_Curso }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Categoria:</strong>
                                    {{ $gestionCurso->categoria }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Mes Poa:</strong>
                                    {{ $gestionCurso->Mes_Poa }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Estado Curso:</strong>
                                    {{ $gestionCurso->Estado_Curso }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Jornada Curso:</strong>
                                    {{ $gestionCurso->Jornada_Curso }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Direccion:</strong>
                                    {{ $gestionCurso->Direccion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Nombre Poa:</strong>
                                    {{ $gestionCurso->id_nombre_poa }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fecharegistro:</strong>
                                    {{ $gestionCurso->fechaRegistro }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Cupo:</strong>
                                    {{ $gestionCurso->cupo }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
