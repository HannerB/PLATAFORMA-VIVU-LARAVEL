@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Files Concertacione
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Files Concertacione</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('files-concertaciones.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('files-concertacione.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
