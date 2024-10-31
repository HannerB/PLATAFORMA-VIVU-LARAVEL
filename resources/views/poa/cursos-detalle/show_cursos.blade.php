@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <!-- Card de Información del Curso -->
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Información del Curso</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Municipio:</strong> {{ $curso->Municipio_Curso }}</p>
                                <p><strong>Nombre del Curso:</strong> {{ $curso->Nombre_Curso }}</p>
                                <p><strong>Nivel de Formación:</strong> {{ $curso->Nivel_Formacion }}</p>
                                <p><strong>Estado:</strong>
                                    <span
                                        class="badge badge-{{ $curso->Estado_Curso == 'Activo' ? 'success' : 'secondary' }}">
                                        {{ $curso->Estado_Curso }}
                                    </span>
                                </p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>POA:</strong> {{ $curso->Nombre_Poa }}</p>
                                <p><strong>Categoría:</strong> {{ $curso->categoria }}</p>
                                <p><strong>Mes:</strong> {{ $curso->Mes_Poa }}</p>
                                <p><strong>Dirección:</strong> {{ $curso->Direccion }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabla de Inscritos -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Participantes Inscritos</h5>
                        <span class="badge badge-light">Total: {{ $inscritos->count() }}</span>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Nombres</th>
                                        <th>Tipo Doc.</th>
                                        <th>Documento</th>
                                        <th>Teléfono</th>
                                        <th>Correo</th>
                                        <th>Población</th>
                                        <th>Fecha Registro</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($inscritos as $inscrito)
                                        <tr>
                                            <td>{{ $inscrito->nombres }} {{ $inscrito->apellidos }}</td>
                                            <td>{{ $inscrito->tipodocumento }}</td>
                                            <td>{{ $inscrito->documento }}</td>
                                            <td>{{ $inscrito->telefono }}</td>
                                            <td>{{ $inscrito->email }}</td>
                                            <td>{{ $inscrito->tipoPoblacion }}</td>
                                            <td>{{ \Carbon\Carbon::parse($inscrito->fecha_registro)->format('d/m/Y') }}
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                    data-target="#deleteModal{{ $inscrito->id_cursos_detalle }}">
                                                    <i class="fa fa-trash"></i> Eliminar
                                                </button>
                                            </td>
                                        </tr>

                                        <!-- Modal de Eliminación para cada inscrito -->
                                        <div class="modal fade" id="deleteModal{{ $inscrito->id_cursos_detalle }}"
                                            tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteModalLabel">Confirmar eliminación
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        ¿Está seguro que desea eliminar al inscrito
                                                        {{ $inscrito->nombres }} {{ $inscrito->apellidos }}?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form
                                                            action="{{ route('cursos-detalle.destroy', $inscrito->id_cursos_detalle) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Cancelar</button>
                                                            <button type="submit" class="btn btn-danger">Eliminar</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <tr>
                                            <td colspan="8" class="text-center">No hay participantes inscritos en este
                                                curso</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-12">
                <a href="{{ route('planeacion') }}" class="btn btn-secondary">
                    <i class="fa fa-arrow-left"></i> Volver
                </a>
            </div>
        </div>
    </div>

    @push('styles')
        <style>
            .card {
                box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
            }

            .table td,
            .table th {
                vertical-align: middle;
            }

            .badge {
                font-size: 90%;
            }
        </style>
    @endpush
@endsection
