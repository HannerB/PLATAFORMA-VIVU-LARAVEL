@extends('layouts.app')

@section('content')
    <div class="container contenedor">
        @if (session('status'))
            <div class="alert alert-success alert-dismissible" style="margin-top:20px;">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <span class="icon-checkmark"></span> {{ session('status') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible" style="margin-top:20px;">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <span class="icon-checkmark"></span> Operacion NO Realizada: {{ session('error') }}
            </div>
        @endif

        <br>

        @if (auth()->user()->alianza != 0)
            <button onclick="ocultar()" class="btn btn-warning">Ocultar / Mostrar Registrar Nuevos Cursos</button>
        @endif

        @if (auth()->user()->alianza != 1 && $gestionCursos->count() > 0)
            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdropconcertaciones">Mis
                Concertaciones</button>
        @endif

        <div id="ocultar" style="display: none;">
            <form action="" method="POST">
                @csrf
                <div class="form-group">
                    <label for="Centro_Formacion">Centro de Formación</label>
                    <select name="Centro_Formacion" id="Centro_Formacion" class="form-select" required>
                        <option value="">Seleccione</option>
                        <option value="CENTRO DE COMERCIO Y SERVICIOS">CENTRO DE COMERCIO Y SERVICIOS</option>
                        <option value="CENTRO INDUSTRIAL Y DE AVIACION">CENTRO INDUSTRIAL Y DE AVIACION</option>
                        <option value="CENTRO NACIONAL COLOMBO ALEMAN">CENTRO NACIONAL COLOMBO ALEMAN</option>
                        <option value="CEDAGRO">CEDAGRO</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="Nivel_Formacion">Nivel de Formación</label>
                    <select name="Nivel_Formacion" id="Nivel_Formacion" class="form-select" required>
                        <option value="">Seleccione</option>
                        <option value="Formacion Complementaria">Formación Complementaria</option>
                        <option value="Formacion Titulada">Formación Titulada</option>
                        <option value="Certificacion por competencias Laborales">Certificación por competencias Laborales
                        </option>
                        <option value="Evento divulgacion Tecnologica">Evento divulgación Tecnológica</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="Nombre_Curso">Nombre programa de Formación</label>
                    <input type="text" class="form-control" id="Nombre_Curso" name="Nombre_Curso"
                        placeholder="Nombre del programa de formación" required>
                </div>
                <div class="form-group">
                    <label for="categoria">Categoría</label>
                    <select name="categoria" id="categoria" class="form-select" required>
                        <option value="">Seleccione</option>
                        <option value="Tecnología">Tecnología</option>
                        <option value="Salud Ocupacional">Salud Ocupacional</option>
                        <option value="Emprendimiento">Emprendimiento</option>
                        <option value="Confección">Confección</option>
                        <option value="Cocina">Cocina</option>
                        <option value="Gestión">Gestión</option>
                        <option value="Artesanías">Artesanías</option>
                        <option value="Ética">Ética</option>
                        <option value="Pedagogía">Pedagogía</option>
                        <option value="Construcción">Construcción</option>
                        <option value="Belleza">Belleza</option>
                        <option value="Agricultura">Agricultura</option>
                        <option value="LGBTIQ">LGBTIQ</option>
                        <option value="Discapacidad">Discapacidad</option>
                        <option value="Logistica">Logística</option>
                        <option value="Etnias">Etnias</option>
                        <option value="Ingles">Inglés</option>
                        <option value="Electricidad">Electricidad</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="Mes_Poa">Mes de ejecución</label>
                    <select name="Mes_Poa" id="Mes_Poa" class="form-select" required>
                        <option value="">Seleccione</option>
                        <option value="Enero">Enero</option>
                        <option value="Febrero">Febrero</option>
                        <option value="Marzo">Marzo</option>
                        <option value="Abril">Abril</option>
                        <option value="Mayo">Mayo</option>
                        <option value="Junio">Junio</option>
                        <option value="Julio">Julio</option>
                        <option value="Agosto">Agosto</option>
                        <option value="Septiembre">Septiembre</option>
                        <option value="Octubre">Octubre</option>
                        <option value="Noviembre">Noviembre</option>
                        <option value="Diciembre">Diciembre</option>
                    </select>
                </div>
                <input type="hidden" name="Municipio_Curso" id="Municipio_Curso" value="{{ $poa->municipio }}">
                <input type="hidden" name="id_nombre_poa" id="id_nombre_poa" value="{{ $poa->id_poa }}">
                <button type="submit" class="btn btn-primary">Registrar</button>
            </form>
        </div>

        <br><br>

        <table id="tabla" class="table table-striped">
            <thead>
                <tr>
                    <th style="width:80px">Municipio</th>
                    <th style="width:80px">Centro</th>
                    <th style="width:50px">Nivel</th>
                    <th style="width:150px">Curso</th>
                    <th style="width:80px">Categoria</th>
                    <th style="width:80px">Mes</th>
                    <th style="width:50px">Estado</th>
                    <th style="width:30px">Direccion</th>
                    <th style="width:30px">Cupo</th>
                    <th style="width:30px">Inscritos</th>
                    <th style="width:300px">Gestion</th>
                </tr>
                <tr>
                    <td colspan="11">
                        <input id="buscar" type="text" class="form-control" placeholder="filtrar" />
                    </td>
                </tr>
            </thead>
            <tbody>
                @foreach ($gestionCursos as $curso)
                    <tr>
                        <td class="gfgMunicipio_Curso">{{ $curso->Municipio_Curso }}</td>
                        <td class="gfgCentro_Formacion">{{ $curso->Centro_Formacion }}</td>
                        <td class="gfgNivel_Formacion">{{ $curso->Nivel_Formacion }}</td>
                        <td class="gfgNombre_Curso">{{ $curso->Nombre_Curso }}</td>
                        <td class="gfgcategoria">{{ $curso->categoria }}</td>
                        <td class="gfgMes_Poa">{{ $curso->Mes_Poa }}</td>
                        <td class="gfgEstado_Curso">{{ $curso->Estado_Curso }}</td>
                        <td class="gfgdireccion">{{ $curso->Direccion }}</td>
                        <td class="gfgcupo">{{ $curso->cupo }}</td>
                        <td class="gfginscritos">{{ $curso->inscritos->count() }}</td>
                        <td class="gfgid" style="display:none">{{ $curso->id_Gestion_Cursos }}</td>
                        <td>
                            <button class="gfgselect btn btn-primary btn-xs" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop">Editar</button>
                            @if (auth()->user()->alianza != 2)
                                <button class="gfgdelete btn btn-danger btn-xs" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdropDelete">Borrar</button>
                            @endif
                            <a href="{{ route('curso_detalle', $curso->id_Gestion_Cursos) }}"
                                class="btn btn-warning btn-xs">Ver Detalle</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- @include('partials.modals.gestion_curso_edit')
@include('partials.modals.gestion_curso_delete')
@include('partials.modals.concertaciones') --}}
@endsection

@push('scripts')
    <script>
        function ocultar() {
            $("#ocultar").toggle();
        }

        $(document).ready(function() {
            $("#ocultar").toggle();

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

            $(".gfgselect").click(function() {
                var row = $(this).closest("tr");
                var data = {
                    id: row.find(".gfgid").text(),
                    Centro_Formacion: row.find(".gfgCentro_Formacion").text(),
                    Nivel_Formacion: row.find(".gfgNivel_Formacion").text(),
                    Nombre_Curso: row.find(".gfgNombre_Curso").text(),
                    categoria: row.find(".gfgcategoria").text(),
                    Mes_Poa: row.find(".gfgMes_Poa").text(),
                    Estado_Curso: row.find(".gfgEstado_Curso").text(),
                    Direccion: row.find(".gfgdireccion").text(),
                    cupo: row.find(".gfgcupo").text()
                };

                // Llenar el formulario de edición con los datos
                $("#editForm").attr("action", "/gestion-cursos2/" + data.id);
                $("#editCentro_Formacion").val(data.Centro_Formacion);
                $("#editNivel_Formacion").val(data.Nivel_Formacion);
                $("#editNombre_Curso").val(data.Nombre_Curso);
                $("#editcategoria").val(data.categoria);
                $("#editMes_Poa").val(data.Mes_Poa);
                $("#editEstado_Curso").val(data.Estado_Curso);
                $("#editDireccion").val(data.Direccion);
                $("#editcupo").val(data.cupo);
            });

            $(".gfgdelete").click(function() {
                var id = $(this).closest("tr").find(".gfgid").text();
                $("#deleteForm").attr("action", "/gestion-cursos2/" + id);
            });
        });
    </script>
@endpush
