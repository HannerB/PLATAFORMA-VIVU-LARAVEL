@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fa fa-check-circle"></i> {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fa fa-times-circle"></i> {{ session('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <!-- Formulario de Registro -->
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-primary text-white">
                <h5 class="card-title mb-0">Asignar Responsable</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('asignar-municipio.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="municipio">Municipio</label>
                                <select name="municipio" id="municipio"
                                    class="form-select @error('municipio') is-invalid @enderror" required>
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

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="id_responsable">Orientador</label>
                                <select name="id_responsable" id="id_responsable"
                                    class="form-select @error('id_responsable') is-invalid @enderror" required>
                                    <option value="" selected></option>
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

                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-save"></i> Registrar
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Tabla de Asignaciones -->
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
                            @foreach ($asignaciones as $asignacion)
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
                                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#editModal{{ $asignacion->id }}">
                                            <i class="fa fa-edit"></i> Editar
                                        </button>
                                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal{{ $asignacion->id }}">
                                            <i class="fa fa-trash"></i> Borrar
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Modales para Editar y Eliminar -->
        @foreach ($asignaciones as $asignacion)
            <!-- Modal Editar -->
            <div class="modal fade" id="editModal{{ $asignacion->id }}" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="{{ route('asignar-municipio.update', $asignacion->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="modal-header">
                                <h5 class="modal-title">Actualizar Registro</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group mb-3">
                                    <label>Municipio</label>
                                    <select name="municipio" class="form-select" required>
                                        <option value="{{ $asignacion->municipio }}">{{ $asignacion->municipio }}</option>
                                        @foreach (['BARANOA', 'BARRANQUILLA', 'CAMPO DE LA CRUZ', 'CANDELARIA', 'GALAPA', 'JUAN DE ACOSTA', 'LURUACO', 'MALAMBO', 'MANATÍ', 'PALMAR DE VARELA', 'PIOJO', 'POLONUEVO', 'PONEDERA', 'PUERTO COLOMBIA', 'REPELÓN', 'SABANAGRANDE', 'SABANALARGA', 'SANTA LUCÍA', 'SANTO TOMÁS', 'SOLEDAD', 'SUÁN', 'TUBARA', 'USIACURI'] as $mun)
                                            @if ($mun != $asignacion->municipio)
                                                <option value="{{ $mun }}">{{ $mun }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group mb-3">
                                    <label>Orientador</label>
                                    <input type="text" class="form-control"
                                        value="{{ $asignacion->user->nombres }} {{ $asignacion->user->apellidos }}"
                                        disabled>
                                </div>

                                <div class="form-group mb-3">
                                    <label>Periodo</label>
                                    <input type="text" class="form-control" name="periodo"
                                        value="{{ $asignacion->periodo }}" required>
                                </div>

                                <div class="form-group">
                                    <label>Estado</label>
                                    <select name="estado" class="form-select" required>
                                        <option value="{{ $asignacion->estado }}">{{ $asignacion->estado }}</option>
                                        <option value="activo">activo</option>
                                        <option value="inactivo">inactivo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Actualizar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal Eliminar -->
            <div class="modal fade" id="deleteModal{{ $asignacion->id }}" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="{{ route('asignar-municipio.destroy', $asignacion->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <div class="modal-header">
                                <h5 class="modal-title">Eliminar Registro</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <p>¿Está seguro de que desea eliminar este registro?</p>
                                <div class="form-group mb-3">
                                    <label>Municipio</label>
                                    <input type="text" class="form-control" value="{{ $asignacion->municipio }}"
                                        disabled>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Orientador</label>
                                    <input type="text" class="form-control"
                                        value="{{ $asignacion->user->nombres }} {{ $asignacion->user->apellidos }}"
                                        disabled>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Periodo</label>
                                    <input type="text" class="form-control" value="{{ $asignacion->periodo }}"
                                        disabled>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    @push('scripts')
        <script>
            // Función de búsqueda en la tabla
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
@endsection
