@extends('layouts.app')

@section('template_title')
    {{ $filesConcertacione->name ?? __('Show') . " " . __('Files Concertacione') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Files Concertacione</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('files-concertaciones.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Id File Concertaciones:</strong>
                                    {{ $filesConcertacione->id_file_concertaciones }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Mes Concertacion:</strong>
                                    {{ $filesConcertacione->mes_concertacion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Vigencia:</strong>
                                    {{ $filesConcertacione->vigencia }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Ruta:</strong>
                                    {{ $filesConcertacione->ruta }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Users Id:</strong>
                                    {{ $filesConcertacione->users_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Estado:</strong>
                                    {{ $filesConcertacione->estado }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Tipo:</strong>
                                    {{ $filesConcertacione->tipo }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
