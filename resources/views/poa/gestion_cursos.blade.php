@extends('layouts.app')

@section('content')
    <div class="container contenedor">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <span class="icon-checkmark"></span> {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <span class="icon-checkmark"></span> {{ session('error') }}
            </div>
        @endif

        <button onclick="ocultar()" class="btn btn-warning">Ocultar / Mostrar Registrar Nuevos Cursos</button>

        @if (Auth::user()->alianza == 2 || $valores > 0)
            <button class="btn btn-danger ml-2" data-toggle="modal" data-target="#staticBackdropconcertaciones">
                Mis Concertaciones
            </button>
        @endif

        <div class="ocular" id="ocultar" style="display: none;">
            <div class="container center-fluid">
                <form action="{{ route('gestion-curso.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <br>
                        <label>Centro de Formación</label>
                        <select name="Centro_Formacion" class="form-select" required>
                            <option value=""></option>
                            <option value="CENTRO DE COMERCIO Y SERVICIOS">CENTRO DE COMERCIO Y SERVICIOS</option>
                            <option value="CENTRO INDUSTRIAL Y DE AVIACION">CENTRO INDUSTRIAL Y DE AVIACION</option>
                            <option value="CENTRO NACIONAL COLOMBO ALEMAN">CENTRO NACIONAL COLOMBO ALEMAN</option>
                            <option value="CEDAGRO">CEDAGRO</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Nivel de Formación</label>
                        <select name="Nivel_Formacion" class="form-select" required>
                            <option value=""></option>
                            <option value="Formacion Complementaria">Formación Complementaria</option>
                            <option value="Formacion Titulada">Formación Titulada</option>
                            <option value="Certificacion por competencias Laborales">Certificación por competencias
                                Laborales</option>
                            <option value="Evento divulgacion Tecnologica">Evento divulgación Tecnológica</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Nombre programa de Formación</label>
                        <input type="text" class="form-control" name="Nombre_Curso" required>
                    </div>

                    <div class="form-group">
                        <label>Categoría</label>
                        <select type="text" class="form-control" name="categoria" required>
                            <option value=""></option>
                            <option value="Tecnología">Tecnología</option>
                            <option value="Salud Ocupacional">Salud Ocupacional</option>
                            <!-- Agregar resto de opciones -->
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Mes de ejecución</label>
                        <select name="Mes_Poa" class="form-select" required>
                            <option value=""></option>
                            <option value="Enero">Enero</option>
                            <option value="Febrero">Febrero</option>
                            <!-- Agregar resto de meses -->
                        </select>
                    </div>

                    <input type="hidden" name="id_nombre_poa" value="{{ $poa->id_poa }}">
                    <button type="submit" class="btn btn-primary">Registrar</button>
                </form>
            </div>
        </div>

        <br><br>

        <table id="tabla" class="table table-striped">
            <thead>
                <tr>
                    <th>Municipio Curso</th>
                    <th>Centro Formación</th>
                    <th>Nivel Formación</th>
                    <th>Nombre Curso</th>
                    <th>Categoría</th>
                    <th>Mes</th>
                    <th>Estado</th>
                    <th>Dirección</th>
                    <th>Cupo</th>
                    <th>Inscritos</th>
                    <th>Gestión</th>
                </tr>
                <tr>
                    <td colspan="11">
                        <input id="buscar" type="text" class="form-control" placeholder="Filtrar" />
                    </td>
                </tr>
            </thead>
            <tbody>
                @foreach ($consulta as $curso)
                    <tr>
                        <td>{{ $curso->Municipio_Curso }}</td>
                        <td>{{ $curso->Centro_Formacion }}</td>
                        <td>{{ $curso->Nivel_Formacion }}</td>
                        <td>{{ $curso->Nombre_Curso }}</td>
                        <td>{{ $curso->categoria }}</td>
                        <td>{{ $curso->Mes_Poa }}</td>
                        <td>{{ $curso->Estado_Curso }}</td>
                        <td>{{ $curso->Direccion }}</td>
                        <td>{{ $curso->cupo }}</td>
                        <td>{{ $curso->inscritos_count ?? 0 }}</td>
                        <td>
                            <button class="btn btn-primary btn-xs" data-toggle="modal"
                                data-target="#editModal{{ $curso->id_Gestion_Cursos }}">
                                Editar
                            </button>
                            <button class="btn btn-danger btn-xs" data-toggle="modal"
                                data-target="#deleteModal{{ $curso->id_Gestion_Cursos }}">
                                Borrar
                            </button>
                            <a href="{{ route('gestion-curso.cursos-detalle', $curso->id_Gestion_Cursos) }}"
                                class="btn btn-warning btn-xs">
                                <span></span>Ver Detalle
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- Incluir modales --}}
        {{-- @include('partials.modals.gestion_curso.edit')
        @include('partials.modals.gestion_curso.delete') --}}
    </div>

    @push('scripts')
        <script>
            // Script para ocultar/mostrar formulario
            function ocultar() {
                $("#ocultar").toggle();
            }
            $("#ocultar").toggle();

            // Script para filtrar tabla
            var busqueda = document.getElementById('buscar');
            var table = document.getElementById("tabla").tBodies[0];

            buscaTabla = function() {
                texto = busqueda.value.toLowerCase();
                var r = 0;
                while (row = table.rows[r++]) {
                    if (row.innerText.toLowerCase().indexOf(texto) !== -1)
                        row.style.display = null;
                    else
                        row.style.display = 'none';
                }
            }

            busqueda.addEventListener('keyup', buscaTabla);
        </script>
    @endpush
@endsection
