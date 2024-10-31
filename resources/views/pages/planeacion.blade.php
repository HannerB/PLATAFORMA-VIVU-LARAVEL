@extends('layouts.app')

@section('content')
    <div class="container contenedor">
        @if (session('success'))
            <div class="alert alert-dismissible alert-success" style="margin-top:20px;">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <span class="icon-checkmark"></span> {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-dismissible alert-danger" style="margin-top:20px;">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <span class="icon-checkmark"></span> Operación NO Realizada: {{ session('error') }}
            </div>
        @endif

        <form class="row g-3" action="" method="GET">
            {{-- <form class="row g-3" action="{{ route('poa.planeacion') }}" method="GET"> --}}
            <div class="input-group">
                <div class="col-auto">
                    <label for="filtrar">Filtrar por municipio </label>
                </div>
                <div class="col-4">
                    <select class="form-select col-auto" id="filtro" name="filtro" aria-label="Filtrar municipio"
                        required>
                        <option value="" selected>Seleccione</option>
                        <option value="" {{ $municipio == '' ? 'selected' : '' }}>Atlantico - todos los cursos
                        </option>
                        @foreach (['BARANOA', 'BARRANQUILLA', 'CAMPO DE LA CRUZ', 'CANDELARIA', 'GALAPA', 'JUAN DE ACOSTA', 'LURUACO', 'MALAMBO', 'MANATÍ', 'PALMAR DE VARELA', 'PIOJO', 'POLONUEVO', 'PONEDERA', 'PUERTO COLOMBIA', 'REPELÓN', 'SABANAGRANDE', 'SABANALARGA', 'SANTA LUCÍA', 'SANTO TOMÁS', 'SOLEDAD', 'SUÁN', 'TUBARA', 'USIACURI'] as $mun)
                            <option value="{{ $mun }}" {{ $municipio == $mun ? 'selected' : '' }}>
                                {{ $mun }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <button class="btn btn-outline-secondary" type="submit">Buscar</button>
                </div>
            </div>
        </form>

        <br><br>

        <table id="tabla" class="table table-striped">
            <thead>
                <tr>
                    <th style="width:80px">Municipio Curso</th>
                    <th style="width:80px">Orientador</th>
                    <th style="width:80px">Poa</th>
                    <th style="width:50px">Nivel Formación</th>
                    <th style="width:150px">Nombre Curso</th>
                    <th style="width:80px">Categoría</th>
                    <th style="width:80px">Mes</th>
                    <th style="width:50px">Estado</th>
                    <th style="width:30px">Dirección</th>
                    <th style="width:30px">Inscritos</th>
                    <th style="width:300px">Gestión</th>
                </tr>
                <tr>
                    <td colspan="11">
                        <input id="buscar" type="text" class="form-control" placeholder="Filtrar" />
                    </td>
                </tr>
            </thead>
            <tbody>
                @foreach ($cursos as $curso)
                    <tr>
                        <td class="gfgMunicipio_Curso">{{ $curso->Municipio_Curso }}</td>
                        <td class="gfgCentro_Formacion">{{ $curso->nombres }} {{ $curso->apellidos }}</td>
                        <td class="gfgCentro_Formacion">{{ $curso->Nombre_Poa }}</td>
                        <td class="gfgNivel_Formacion">{{ $curso->Nivel_Formacion }}</td>
                        <td class="gfgNombre_Curso">{{ $curso->Nombre_Curso }}</td>
                        <td class="gfgcategoria">{{ $curso->categoria }}</td>
                        <td class="gfgMes_Poa">{{ $curso->Mes_Poa }} {{ $curso->periodo }}</td>
                        <td class="gfgEstado_Curso">{{ $curso->Estado_Curso }}</td>
                        <td class="gfgdireccion">{{ $curso->Direccion }}</td>
                        <td class="gfginscritos">{{ $curso->inscritos }}</td>
                        <td>
                            <a href="{{ route('cursos-detalle.show', $curso->id_Gestion_Cursos) }}"
                                class="btn btn-warning btn-xs">Ver Detalle</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@push('scripts')
    <script>
        function ocultar() {
            $("#ocultar").toggle();
        }
        $("#ocultar").toggle();

        // Búsqueda en tabla
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
    </script>
@endpush
