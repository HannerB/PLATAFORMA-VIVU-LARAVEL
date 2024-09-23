@extends('layouts.app')

@section('template_title')
    {{ $tJuego->name ?? __('Show') . " " . __('T Juego') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} T Juego</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('t-juegos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Juego:</strong>
                                    {{ $tJuego->id_juego }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Nombre:</strong>
                                    {{ $tJuego->nombre }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Anio:</strong>
                                    {{ $tJuego->anio }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Empresa:</strong>
                                    {{ $tJuego->empresa }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
