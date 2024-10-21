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

    @if(auth()->user()->alianza != 0)
        <button onclick="ocultar()" class="btn btn-warning">Ocultar / Mostrar Registrar Nuevos Cursos</button>
    @endif
    
    @if(auth()->user()->alianza != 1 && $gestionCursos->count() > 0)
        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdropconcertaciones">Mis Concertaciones</button>
    @endif

    <div id="ocultar" style="display: none;">
        {{-- <form action="{{ route('gestion-cursos.store') }}" method="POST">
            @csrf
            <!-- Aquí van los campos del formulario para crear nuevo curso -->
        </form> --}}
    </div>

    <br><br>

    <table id="tabla" class="table table-striped">
        <thead>
            <tr>
                <th style="width:80px">Municipio Curso</th>
                <th style="width:80px">Centro Formacion</th>
                <th style="width:50px">Nivel Formacion</th>
                <th style="width:150px">Nombre Curso</th>
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
            @foreach($gestionCursos as $curso)
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
                        <button class="gfgselect btn btn-primary btn-xs" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Editar</button>
                        @if(auth()->user()->alianza != 2)
                            <button class="gfgdelete btn btn-danger btn-xs" data-bs-toggle="modal" data-bs-target="#staticBackdropDelete">Borrar</button>
                        @endif
                        <a href="{{ route('cursos-detalle.show', $curso->id_Gestion_Cursos) }}" class="btn btn-warning btn-xs">Ver Detalle</a>
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
// Aquí va el JavaScript que estaba en el archivo original
// Asegúrate de adaptar las funciones para que trabajen con Laravel y AJAX si es necesario
</script>
@endpush