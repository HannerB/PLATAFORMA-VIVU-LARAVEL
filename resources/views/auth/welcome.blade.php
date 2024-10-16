@extends('layouts.app')

@section('content')
    <div class="container" style="margin-top:40px;">
        <div class="card-body">
            <div class="text-center">
                <p class="font-weight-bold">Hola, {{ Auth::user()->nombres }} {{ Auth::user()->apellidos }}.</p>
                <img src="{{ asset('img/imgPortadaBienvenido.png') }}" class="img-fluid" alt="Bienvenido">
            </div>
        </div>
    </div>
@endsection
