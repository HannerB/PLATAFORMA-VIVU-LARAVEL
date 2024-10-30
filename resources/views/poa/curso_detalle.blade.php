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

        <div class="card mb-4">
            <div class="card-header">
                <h4>Detalles del Curso</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Nombre del Curso:</strong> {{ $gestionCurso->Nombre_Curso }}</p>
                        <p><strong>Centro de Formación:</strong> {{ $gestionCurso->Centro_Formacion }}</p>
                        <p><strong>Nivel de Formación:</strong> {{ $gestionCurso->Nivel_Formacion }}</p>
                        <p><strong>Categoría:</strong> {{ $gestionCurso->categoria }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Municipio:</strong> {{ $gestionCurso->Municipio_Curso }}</p>
                        <p><strong>Mes:</strong> {{ $gestionCurso->Mes_Poa }}</p>
                        <p><strong>Estado:</strong> {{ $gestionCurso->Estado_Curso }}</p>
                        <p><strong>Cupo:</strong> {{ $gestionCurso->cupo }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h4>Inscritos en el Curso</h4>
            </div>
            <div class="card-body">
                <table id="tabla" class="table table-striped">
                    <thead>
                        <tr>
                            <th>Tipo Documento</th>
                            <th>Documento</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Teléfono</th>
                            <th>Población</th>
                            <th>Fecha Registro</th>
                            <th>Acciones</th>
                        </tr>
                        <tr>
                            <td colspan="8">
                                <input id="buscar" type="text" class="form-control" placeholder="Filtrar" />
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($inscritos as $inscrito)
                            <tr>
                                <td>{{ $inscrito->tipodocumento }}</td>
                                <td>{{ $inscrito->documento }}</td>
                                <td>{{ $inscrito->nombres }}</td>
                                <td>{{ $inscrito->apellidos }}</td>
                                <td>{{ $inscrito->telefono }}</td>
                                <td>{{ $inscrito->tipoPoblacion }}</td>
                                <td>{{ $inscrito->fecha_registro }}</td>
                                <td>
                                    <button class="btn btn-danger btn-xs" data-toggle="modal"
                                        data-target="#deleteModal{{ $inscrito->id_cursos_detalle }}">
                                        <span></span>Eliminar
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
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
