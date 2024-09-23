@extends('layouts.app')

@section('template_title')
    {{ $alianzaMunicipio->name ?? __('Show') . " " . __('Alianza Municipio') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Alianza Municipio</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('alianza-municipios.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Alianza:</strong>
                                    {{ $alianzaMunicipio->id_alianza }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Id User:</strong>
                                    {{ $alianzaMunicipio->id_User }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Municipio:</strong>
                                    {{ $alianzaMunicipio->municipio }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Periodo:</strong>
                                    {{ $alianzaMunicipio->periodo }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Enlace Poblacion:</strong>
                                    {{ $alianzaMunicipio->enlace_poblacion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Cargo:</strong>
                                    {{ $alianzaMunicipio->cargo }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Estado:</strong>
                                    {{ $alianzaMunicipio->estado }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Poa Id:</strong>
                                    {{ $alianzaMunicipio->poa_id }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
