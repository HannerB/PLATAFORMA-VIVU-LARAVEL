@extends('layouts.app')

@section('title', 'Mi cuenta | Oferta Complementaria')

@section('content')
    <div class="container content-center mt-4">
        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <span class="icon-checkmark"></span> {{ session('status') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <span class="icon-checkmark"></span> Operación NO Realizada: {{ session('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <!-- Filtrar Form (quitamos el action para hacer solo una prueba de frontend) -->
        <form class="mb-4">
            <div class="input-group">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="filtro"><i class="bi bi-funnel mr-2"></i>Filtrar por
                        municipio</label>
                </div>
                <select class="custom-select" id="filtro" name="filtro" aria-label="Filtrar" required>
                    <option value="" selected>Todos los municipios</option>
                    @foreach (['BARANOA', 'BARRANQUILLA', 'CAMPO DE LA CRUZ', 'CANDELARIA', 'GALAPA', 'JUAN DE ACOSTA', 'LURUACO', 'MALAMBO', 'MANATÍ', 'PALMAR DE VARELA', 'PIOJO', 'POLONUEVO', 'PONEDERA', 'PUERTO COLOMBIA', 'REPELÓN', 'SABANAGRANDE', 'SABANALARGA', 'SANTA LUCÍA', 'SANTO TOMÁS', 'SOLEDAD', 'SUÁN', 'TUBARA', 'USIACURI'] as $municipio)
                        <option value="{{ $municipio }}">{{ $municipio }}</option>
                    @endforeach
                </select>
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-search"></i>Buscar
                    </button>
                </div>
            </div>
        </form>

        <!-- Toggle Detalle Button -->
        <button id="ocultar" onclick="ocultar()" class="btn btn-primary mb-3">Ocultar / Mostrar Detalle</button>

        <!-- Responsive Table -->
        <div class="table-responsive">
            <table id="tabla" class="table table-hover table-bordered align-middle text-center">
                <thead class="thead-dark">
                    <tr>
                        <th>Municipio</th>
                        <th class="columna1">Nivel Formacion</th>
                        <th>Programa</th>
                        <th>Direccion</th>
                        <th class="columna1">Categoria</th>
                        <th class="columna1">Mes de ejecución</th>
                        <th class="columna1">Alianza</th>
                        <th>Gestión</th>
                    </tr>
                    <tr>
                        <td colspan="8">
                            <input id="buscar" type="text" class="form-control" placeholder="Filtrar" />
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cursos as $curso)
                        <tr>
                            <td>{{ $curso->municipio }}</td>
                            <td class="columna1">{{ $curso->formacion }}</td>
                            <td>{{ $curso->curso }}</td>
                            <td>{{ $curso->direccion }}</td>
                            <td class="columna1">{{ $curso->descripcion }}</td>
                            <td class="columna1">{{ $curso->fecha_inicio }}</td>
                            <td class="columna1">{{ $curso->nombre_grupo }}</td>
                            <td>
                                <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#inscriptionModal"
                                    data-curso="{{ $curso->id }}">
                                    Inscribirme
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Modal de Inscripción -->
        <div class="modal fade" id="inscriptionModal" tabindex="-1" aria-labelledby="inscriptionModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="inscriptionModalLabel">Inscripción</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="inscriptionForm">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cedula" class="form-label">Nro de documento</label>
                                        <input type="number" class="form-control" id="cedula" name="cedula"
                                            placeholder="Nro documento" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="anio" class="form-label">Año de nacimiento</label>
                                        <input type="number" class="form-control" id="anio" name="anio"
                                            placeholder="Año de nacimiento" required>
                                    </div>
                                </div>
                                <input type="hidden" id="curso" name="curso" value="">
                            </div>
                        </form>
                        <div id="resultado" class="mt-3"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" id="verificarBtn">Verificar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            var inscriptionModal = $('#inscriptionModal');
            var cursoInput = $('#curso');
            var verificarBtn = $('#verificarBtn');
            var resultadoDiv = $('#resultado');

            inscriptionModal.on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var cursoId = button.data('curso');
                cursoInput.val(cursoId);
            });

            verificarBtn.on('click', function() {
                var cedula = $('#cedula').val();
                var anio = $('#anio').val();
                var cursoId = cursoInput.val();

                // Simulamos el proceso de verificación (sin petición al servidor)
                resultadoDiv.html('Verificando...');

                // Simulamos una respuesta exitosa o fallida
                setTimeout(function() {
                    if (cedula && anio) {
                        resultadoDiv.html('Inscripción exitosa para el curso con ID: ' + cursoId);
                    } else {
                        resultadoDiv.html(
                            'Error: Datos incompletos. Por favor, revisa e intenta de nuevo.');
                    }
                }, 1500);
            });
        });
    </script>
@endpush
