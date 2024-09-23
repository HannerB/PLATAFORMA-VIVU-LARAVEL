@extends('layouts.app')

@section('template_title')
    {{ $concertacione->name ?? __('Show') . " " . __('Concertacione') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Concertacione</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('concertaciones.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Concertacion:</strong>
                                    {{ $concertacione->id_concertacion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Usuario:</strong>
                                    {{ $concertacione->id_usuario }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Gestion Cursos:</strong>
                                    {{ $concertacione->id_gestion_cursos }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fecha Registro:</strong>
                                    {{ $concertacione->fecha_registro }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
