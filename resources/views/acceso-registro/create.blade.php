@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Acceso Registro
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Acceso Registro</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('acceso-registros.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('acceso-registro.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
