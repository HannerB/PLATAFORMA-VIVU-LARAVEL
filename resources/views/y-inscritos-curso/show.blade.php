@extends('layouts.app')

@section('template_title')
    {{ $yInscritosCurso->name ?? __('Show') . " " . __('Y Inscritos Curso') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Y Inscritos Curso</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('y-inscritos-cursos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Curso:</strong>
                                    {{ $yInscritosCurso->id_curso }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Usuario:</strong>
                                    {{ $yInscritosCurso->id_usuario }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Estado:</strong>
                                    {{ $yInscritosCurso->estado }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fecha Reg:</strong>
                                    {{ $yInscritosCurso->fecha_reg }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
