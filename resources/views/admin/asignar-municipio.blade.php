@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <span class="icon-checkmark"></span> {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <span class="icon-checkmark"></span> Operación NO Realizada: {{ session('error') }}
            </div>
        @endif

        {{-- Formulario de Registro --}}
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-primary text-white">
                <h5 class="card-title mb-0">Asignar Responsable</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('asignar-municipio.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        {{-- Select Municipio --}}
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="municipio">Municipio</label>
                                <select name="municipio" id="municipio"
                                    class="form-control @error('municipio') is-invalid @enderror" required>
                                    <option value="" disabled selected>Seleccione...</option>
                                    @foreach (['BARANOA', 'BARRANQUILLA', 'CAMPO DE LA CRUZ', 'CANDELARIA', 'GALAPA', 'JUAN DE ACOSTA', 'LURUACO', 'MALAMBO', 'MANATÍ', 'PALMAR DE VARELA', 'PIOJO', 'POLONUEVO', 'PONEDERA', 'PUERTO COLOMBIA', 'REPELÓN', 'SABANAGRANDE', 'SABANALARGA', 'SANTA LUCÍA', 'SANTO TOMÁS', 'SOLEDAD', 'SUÁN', 'TUBARA', 'USIACURI'] as $mun)
                                        <option value="{{ $mun }}"
                                            {{ old('municipio') == $mun ? 'selected' : '' }}>{{ $mun }}</option>
                                    @endforeach
                                </select>
                                @error('municipio')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Select Orientador --}}
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="id_responsable">Orientador</label>
                                <select name="id_responsable" id="id_responsable"
                                    class="form-control @error('id_responsable') is-invalid @enderror" required>
                                    <option value="" selected>Seleccione...</option>
                                    @foreach ($orientadores as $orientador)
                                        <option value="{{ $orientador->id }}"
                                            {{ old('id_responsable') == $orientador->id ? 'selected' : '' }}>
                                            {{ $orientador->nombres }} {{ $orientador->apellidos }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('id_responsable')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Input Periodo --}}
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="periodo">Periodo</label>
                                <input type="text" class="form-control @error('periodo') is-invalid @enderror"
                                    id="periodo" name="periodo" value="{{ old('periodo') }}" required>
                                @error('periodo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">
                                Registrar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        {{-- Tabla de Asignaciones --}}
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="card-title mb-0">Orientadores Asignados</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="tabla" class="table table-hover">
                        <thead>
                            <tr>
                                <th>Nombres y Apellidos</th>
                                <th>Municipio</th>
                                <th>Vigencia</th>
                                <th>Estado</th>
                                <th>Gestión</th>
                            </tr>
                            <tr>
                                <td colspan="5">
                                    <input id="buscar" type="text" class="form-control" placeholder="Filtrar...">
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($asignaciones as $asignacion)
                                <tr>
                                    <td>
                                        @if ($asignacion->user)
                                            {{ $asignacion->user->nombres }} {{ $asignacion->user->apellidos }}
                                        @else
                                            <span class="text-muted">Usuario no encontrado</span>
                                        @endif
                                    </td>
                                    <td>{{ $asignacion->municipio }}</td>
                                    <td>{{ $asignacion->periodo }}</td>
                                    <td>{{ $asignacion->estado }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-primary" data-toggle="modal"
                                            data-target="#editModal{{ $asignacion->id }}">
                                            Editar
                                        </button>
                                        <button class="btn btn-sm btn-danger" data-toggle="modal"
                                            data-target="#deleteModal{{ $asignacion->id }}">
                                            Borrar
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">No hay asignaciones registradas</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- Inclusión de Modales --}}
        @foreach ($asignaciones as $asignacion)
            @include('partials.modals.municipios.edit', ['asignacion' => $asignacion])
            @include('partials.modals.municipios.delete', ['asignacion' => $asignacion])
        @endforeach
    </div>
@endsection

@push('scripts')
<script>
    document.getElementById('buscar').addEventListener('keyup', function() {
        let texto = this.value.toLowerCase();
        let tabla = document.getElementById('tabla').getElementsByTagName('tbody')[0];
        let filas = tabla.getElementsByTagName('tr');

        for (let fila of filas) {
            let contenido = fila.textContent.toLowerCase();
            fila.style.display = contenido.includes(texto) ? '' : 'none';
        }
    });
</script>
@endpush