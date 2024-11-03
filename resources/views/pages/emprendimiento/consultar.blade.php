@extends('layouts.app')

@section('title', 'Consultar Emprendimiento | Oferta Complementaria')

@section('content')
    <div class="mt-1 PopUpContainer">
        <div class="contentContainer">
            <ol class="breadcrumb">
                <li><a href="{{ route('home') }}">Inicio</a></li>
                <li><a>Emprendimiento</a></li>
            </ol>
        </div>
    </div>

    <div class="container down">
        <h4>
            <a href="{{ route('index') }}" style="color: #FF6C00;">
                Llenar formulario de Emprendimiento
            </a>
        </h4>

        <div class="container down">
            <h3 class="text-center text-light">Solicitudes Emprendimiento</h3>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="cabecera">
                                <tr>
                                    <th scope="col">Nombres</th>
                                    <th scope="col">Apellidos</th>
                                    <th scope="col">Documento</th>
                                    <th scope="col">Género</th>
                                    <th scope="col">Correo Personal</th>
                                    <th scope="col">Teléfono Personal</th>
                                    <th scope="col">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($emprendimientos as $emprendimiento)
                                    <tr>
                                        <td>{{ $emprendimiento->nombresPersonal }}</td>
                                        <td>{{ $emprendimiento->apellidosPersonal }}</td>
                                        <td>{{ $emprendimiento->documentoPersonal }}</td>
                                        <td>{{ $emprendimiento->genero }}</td>
                                        <td>{{ $emprendimiento->correoPersonal }}</td>
                                        <td>{{ $emprendimiento->telefonoMovilPersonal }}</td>
                                        {{-- <td>
                                            <a href="{{ route('emprendimiento.show', $emprendimiento->id) }}"
                                                class="btn btn-sm btn-info">
                                                Descargar
                                            </a>
                                        </td> --}}
                                        <td>
                                            <a href="" class="btn btn-sm btn-info">
                                                Descargar
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-center">
                        {{ $emprendimientos->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .cabecera {
            background-color: #FF6C00;
            color: white;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(255, 108, 0, 0.05);
        }
    </style>
@endpush
