@extends('layouts.app')

@section('template_title')
    {{ $accesoRegistro->name ?? __('Show') . " " . __('Acceso Registro') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Acceso Registro</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('acceso-registros.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Acceso:</strong>
                                    {{ $accesoRegistro->id_acceso }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Estado:</strong>
                                    {{ $accesoRegistro->estado }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Proceso:</strong>
                                    {{ $accesoRegistro->proceso }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
