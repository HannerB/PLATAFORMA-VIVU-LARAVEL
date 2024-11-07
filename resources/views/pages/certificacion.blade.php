@extends('layouts.app')

@section('title', 'Certificaciones por competencias | Oferta Complementaria')

@section('content')
    <div class="mt-1 PopUpContainer">
        <div class="contentContainer">
            <ol class="breadcrumb">
                <li><a href="{{ route('home') }}">Inicio</a></li>
                <li class="active">Certificaciones</li>
            </ol>
        </div>
    </div>

    <div class="container down">
        <h3 class="text-center text-light">Certificaciones por competencia</h3>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead class="cabecera">
                            <tr>
                                <th scope="col">Nombres</th>
                                <th scope="col">Apellidos</th>
                                <th scope="col">Tipo de documento</th>
                                <th scope="col">Documento</th>
                                <th scope="col">Teléfono</th>
                                <th scope="col">Fecha nacimiento</th>
                                <th scope="col">Población</th>
                                <th scope="col">Ocupación</th>
                                <th scope="col">Fecha de registro</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($certificaciones as $certificacion)
                                <tr>
                                    <td>{{ $certificacion->nombres }}</td>
                                    <td>{{ $certificacion->apellidos }}</td>
                                    <td>{{ $certificacion->tipodocumento }}</td>
                                    <td>{{ $certificacion->documento }}</td>
                                    <td>{{ $certificacion->telefono }}</td>
                                    <td>{{ $certificacion->fechaNacimiento }}</td>
                                    <td>{{ $certificacion->poblacion }}</td>
                                    <td>{{ $certificacion->ocupacion }}</td>
                                    <td>{{ $certificacion->fechaRegistro }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .table thead.cabecera {
            background-color: #343a40;
            color: white;
        }
    </style>
@endpush
