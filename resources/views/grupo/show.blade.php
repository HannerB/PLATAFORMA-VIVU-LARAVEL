@extends('layouts.app')

@section('template_title')
    {{ $grupo->name ?? __('Show') . " " . __('Grupo') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Grupo</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('grupos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Nombre Grupo:</strong>
                                    {{ $grupo->nombre_grupo }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Tipo Archivo:</strong>
                                    {{ $grupo->tipo_archivo }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Nombre Archivo:</strong>
                                    {{ $grupo->nombre_archivo }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
