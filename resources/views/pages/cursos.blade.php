@extends('layouts.app')

@section('title', 'Cursos | Oferta Complementaria')

@section('content')
    <div class="container content-center mt-4">
        {{-- @include('partials.alerts') --}}
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

        <div class="card">
            <div class="card-header text-center">
                <h4 class="mb-0">Ofertas por área</h4>
            </div>
            <div class="card-body">
                <!-- Filtrar Form -->
                <div class="row mb-4">
                    <div class="col-md-8">
                        <form method="GET" action="{{ route('cursos.index') }}" class="form-inline">
                            <div class="input-group w-100">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="filtro">
                                        <i class="fa fa-filter mr-2"></i>Municipio
                                    </label>
                                </div>
                                <select class="custom-select" id="filtro" name="municipio">
                                    <option value="">Todos los municipios</option>
                                    @foreach ($municipios as $municipio)
                                        <option value="{{ $municipio }}"
                                            {{ request('municipio') == $municipio ? 'selected' : '' }}>
                                            {{ $municipio }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-search"></i> Buscar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="text" class="form-control" id="searchTable" placeholder="Buscar en la tabla...">
                        </div>
                    </div>
                </div>

                <button id="toggleDetalle" class="btn btn-outline-primary mb-3">
                    <i class="fa fa-eye"></i> Ocultar / Mostrar Detalle
                </button>

                <!-- Tabla Responsive -->
                <div class="table-responsive">
                    <table id="cursosTable" class="table table-hover table-bordered align-middle text-center">
                        <thead class="thead-dark">
                            <tr>
                                <th>Municipio</th>
                                <th class="columna1">Nivel Formación</th>
                                <th>Programa</th>
                                <th>Dirección</th>
                                <th class="columna1">Categoría</th>
                                <th class="columna1">Fecha Inicio</th>
                                <th class="columna1">Grupo</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($cursos as $curso)
                                <tr>
                                    <td>{{ $curso->municipio }}</td>
                                    <td class="columna1">{{ $curso->formacion }}</td>
                                    <td>{{ $curso->curso }}</td>
                                    <td>{{ $curso->direccion }}</td>
                                    <td class="columna1">{{ $curso->descripcion }}</td>
                                    <td class="columna1">{{ $curso->fecha_inicio }}</td>
                                    <td class="columna1">{{ $curso->nombre_grupo }}</td>
                                    <td>
                                        @auth
                                            <button class="btn btn-warning btn-sm inscribir-btn" data-toggle="modal"
                                                data-target="#inscriptionModal" data-curso-id="{{ $curso->id }}">
                                                <i class="fa fa-user-plus"></i> Inscribirme
                                            </button>
                                        @else
                                            <a href="{{ route('login') }}" class="btn btn-info btn-sm">
                                                <i class="fa fa-sign-in"></i> Iniciar sesión
                                            </a>
                                        @endauth
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">
                                        No hay cursos disponibles
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div class="d-flex justify-content-center mt-4">
                        {{ $cursos->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('partials.modals.cursos.inscription')
@endsection

@push('styles')
    <style>
        .columna1 {
            display: none;
        }

        .table th {
            vertical-align: middle;
        }

        .btn-sm {
            padding: 0.25rem 0.5rem;
        }
    </style>
@endpush

@push('scripts')
    <script>
        $(document).ready(function() {
            // Toggle columnas
            $('#toggleDetalle').click(function() {
                $('.columna1').toggle();
            });

            // Búsqueda en tabla
            $('#searchTable').on('keyup', function() {
                var value = $(this).val().toLowerCase();
                $('#cursosTable tbody tr').filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });

            // Manejo del modal
            $('.inscribir-btn').click(function() {
                var cursoId = $(this).data('curso-id');
                $('#curso_id').val(cursoId);
            });

            // Envío del formulario con AJAX
            $('#inscriptionForm').on('submit', function(e) {
                e.preventDefault();

                $.ajax({
                    url: $(this).attr('action'),
                    method: 'POST',
                    data: $(this).serialize(),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        $('#resultado').html(
                            '<div class="alert alert-success">' +
                            '<i class="fa fa-check-circle"></i> ' +
                            response.message +
                            '</div>'
                        );
                        setTimeout(function() {
                            $('#inscriptionModal').modal('hide');
                            location.reload();
                        }, 2000);
                    },
                    error: function(xhr) {
                        $('#resultado').html(
                            '<div class="alert alert-danger">' +
                            '<i class="fa fa-exclamation-circle"></i> ' +
                            xhr.responseJSON.message +
                            '</div>'
                        );
                    }
                });
            });
        });
    </script>
@endpush
