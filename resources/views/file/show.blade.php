@extends('layouts.app')

@section('template_title')
    {{ $file->name ?? __('Show') . " " . __('File') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} File</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('files.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Users:</strong>
                                    {{ $file->id_users }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Ruta:</strong>
                                    {{ $file->ruta }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fecharegistro:</strong>
                                    {{ $file->fechaRegistro }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
