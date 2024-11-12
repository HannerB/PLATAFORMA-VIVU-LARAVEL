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
                <span class="icon-checkmark"></span> Operación NO Realizada: {{ session('error') }}
            </div>
        @endif

        @if ($municipiosAsignados->isEmpty())
            <div class="alert alert-warning">
                No hay municipios asignados actualmente.
            </div>
        @endif

        @if ($poas->isEmpty())
            <div class="alert alert-warning">
                No hay POAs registrados actualmente.
            </div>
        @endif

        <br>
        @if (!Auth::user()->hasAlianza())
            <button onclick="ocultar()" class="btn btn-warning">Ocultar / Mostrar Registrar nuevos POA</button>
        @endif

        <div class="ocultar" id="ocultar" style="display: none;">
            <div class="container center-fluid">
                <form action="{{ route('poa.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="municipio">Municipio</label>
                        <select name="municipio" id="municipio" class="form-select" required>
                            <option value="" selected>Seleccione un municipio</option>
                            @foreach ($municipiosAtlantico as $municipio)
                                <option value="{{ $municipio }}">{{ $municipio }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="Nombre_Poa">Nombre del Poa</label>
                        <input type="text" class="form-control" id="Nombre_Poa" name="Nombre_Poa"
                            placeholder="Nombre Poa" required>
                    </div>

                    <div class="form-group">
                        <label for="Persona_Enlace">Persona o Enlace</label>
                        <input type="text" class="form-control" id="Persona_Enlace" name="Persona_Enlace"
                            placeholder="Persona Enlace" required>
                    </div>

                    <div class="form-group">
                        <label for="Telefono_Enlace">Teléfono del Enlace</label>
                        <input type="number" class="form-control" id="Telefono_Enlace" name="Telefono_Enlace"
                            placeholder="Teléfono Enlace" required>
                    </div>

                    <div class="form-group">
                        <label for="Correo_Enlace">Correo del Enlace</label>
                        <input type="email" class="form-control" id="Correo_Enlace" name="Correo_Enlace"
                            placeholder="Correo Enlace" required>
                    </div>

                    <div class="form-group">
                        <label for="Poblacion">Población del Poa</label>
                        <input type="text" class="form-control" id="Poblacion" name="Poblacion" placeholder="Población"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="Ocupacion_Productiva">Ocupación Productiva</label>
                        <input type="text" class="form-control" id="Ocupacion_Productiva" name="Ocupacion_Productiva"
                            placeholder="Ocupación Productiva" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Registrar</button>
                </form>
            </div>
            <br>
        </div>

        <br><br>

        <table id="tabla" class="table table-striped">
            <thead>
                <tr>
                    <th style="width:80px">Nombre Poa</th>
                    <th style="width:80px">Municipio</th>
                    <th style="width:50px">Vigencia</th>
                    <th style="width:100px">Enlace</th>
                    <th style="width:50px">Teléfono</th>
                    <th style="width:80px">Tipo Población</th>
                    <th style="width:80px">Vocación Productiva</th>
                    <th style="width:30px">Cursos</th>
                    <th style="width:280px">Gestión del Poa</th>
                </tr>
                <tr>
                    <td colspan="9">
                        <input id="buscar" type="text" class="form-control" placeholder="Filtrar" />
                    </td>
                </tr>
            </thead>
            <tbody>
                @foreach ($poas as $poa)
                    <tr>
                        <td class="gfgnombres">{{ $poa->Nombre_Poa }}</td>
                        <td class="gfgmunicipio">{{ $poa->asignarMunicipio->municipio }}</td>
                        <td class="gfgperiodo">{{ $poa->asignarMunicipio->periodo }}</td>
                        <td class="gfgPersona_Enlace">{{ $poa->Persona_Enlace }}</td>
                        <td class="gfgTelefono_Enlace">{{ $poa->Telefono_Enlace }}</td>
                        <td class="gfgPoblacion">{{ $poa->Poblacion }}</td>
                        <td class="gfgOcupacion_Productiva">{{ $poa->Ocupacion_Productiva }}</td>
                        <td class="gfgcursos">{{ $poa->gestionCursos->count() }}</td>
                        <td class="gfgid" style="display:none">{{ $poa->id_poa }}</td>
                        <td>
                            @if (!Auth::user()->hasAlianza())
                                <button class="gfgselect btn btn-primary btn-xs" data-toggle="modal"
                                    data-target="#staticBackdrop">
                                    <span></span>Editar
                                </button>
                                <button class="gfgdelete btn btn-danger btn-xs" data-toggle="modal"
                                    data-target="#staticBackdropDelete">
                                    <span></span>Borrar
                                </button>
                            @endif
                            <a href="{{ route('poa.gestion-cursos', $poa->id_poa) }}" class="btn btn-warning btn-xs">
                                <span></span>Ver Cursos
                            </a>
                            <button class="gfgenlace btn btn-success btn-xs" data-toggle="modal"
                                data-target="#staticBackdropenlace">
                                <span></span>Enlace
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Modales -->
        @include('partials.modals.poa.poa_delete')
        @include('partials.modals.poa.poa_edit')
        @include('partials.modals.poa.poa_enlace')
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {

            // Función de búsqueda
            var busqueda = document.getElementById('buscar');
            var table = document.getElementById("tabla").tBodies[0];

            function buscaTabla() {
                var texto = busqueda.value.toLowerCase();
                var r = 0;
                while (row = table.rows[r++]) {
                    if (row.innerText.toLowerCase().indexOf(texto) !== -1)
                        row.style.display = null;
                    else
                        row.style.display = 'none';
                }
            }

            busqueda.addEventListener('keyup', buscaTabla);
        });

        // Función para ocultar/mostrar formulario
        function ocultar() {
            $("#ocultar").toggle();
        }

        // Ocultar formulario inicialmente
        $("#ocultar").toggle();
    </script>
@endpush
