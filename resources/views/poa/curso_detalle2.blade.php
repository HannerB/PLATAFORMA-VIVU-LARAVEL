@extends('layouts.app')

@section('content')
    <div class="container content-center">
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

        {{-- <form action="{{ route('cursos.descargar') }}" method="POST"> --}}
        <form action="" method="POST">
            @csrf
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Resumen inscritos</label>
                <textarea readonly class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <div>
                <div class="input-group">
                    <div class="col-auto">
                        <label for="filtrar">Seleccione una opción de descarga </label>
                    </div>
                    <div class="col-3">
                        <select class="form-select col-auto" id="filtro" name="filtro" aria-label="Example select with button addon" required>
                            <option value="" selected>Seleccione</option>
                            <option value="1">Descargar Listado inscritos excel</option>
                            <option value="2">Generar / Actualizar Paquete inscritos</option>
                        </select>
                    </div>
                    <div>
                        <button class="btn btn-secondary" type="submit">Seleccionar</button>
                        @if (file_exists(public_path('archivos/Archivo'.$curso->id.'.zip')))
                            <a href="{{ asset('archivos/Archivo'.$curso->id.'.zip') }}" class="btn btn-success btn-xs">
                                <span></span>Descargar Paquete Inscritos
                            </a>
                        @endif
                        @if (auth()->user()->alianza != 1 && $curso->Estado_Curso != "Cerrado por baja demanda" && $curso->Estado_Curso != "Entregado al centro")
                            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#staticBackdropcerrarCurso" type="button">
                                Cerrar Programa de formación
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        </form>

        <br><br>

        <table id="tabla" class="table table-striped">
            <thead>
                <tr>
                    <th style="width:80px">Residencia</th>
                    <th style="width:80px">Tipo documento</th>
                    <th style="width:80px">Documento</th>
                    <th style="width:80px">Nombres y apellidos</th>
                    <th style="width:80px">Teléfono</th>
                    <th style="width:50px">Correo</th>
                    <th style="width:80px">Tipo Población</th>
                    <th style="width:80px">Soporte documento</th>
                    <th style="width:80px">Inscrito Sofia Plus</th>
                    <th style="width:200px">Gestión</th>
                </tr>
                <tr>
                    <td colspan="9">
                        <input id="buscar" type="text" class="form-control" placeholder="Filtrar" />
                    </td>
                </tr>
            </thead>
            <tbody>
                @foreach ($curso->inscritos as $inscrito)
                    <tr>
                        <td class="gfgmunicipio">{{ $inscrito->user->municipio }}</td>
                        <td class="gfgtipodocumento">{{ $inscrito->user->tipodocumento }}</td>
                        <td class="gfgdocumento">{{ $inscrito->user->documento }}</td>
                        <td class="gfgnombrecompleto">{{ $inscrito->user->nombres }} {{ $inscrito->user->apellidos }}</td>
                        <td class="gfgtelefono">{{ $inscrito->user->telefono }}</td>
                        <td class="gfgemail">{{ $inscrito->user->email }}</td>
                        <td class="gfgtipoPoblacion">{{ $inscrito->user->tipoPoblacion }}</td>
                        <td class="gfgmodo_Documento">{{ $inscrito->modo_Documento }}</td>
                        <td class="gfgperiodo">
                            {{-- @if ($inscrito->user->noInscritosSofiaplus->isEmpty())
                                Sí
                            @else
                                No
                            @endif --}}
                        </td>
                        <td class="gfgid" style="display:none">{{ $inscrito->id_cursos_detalle }}</td>
                        <td class="gfgEstado_Curso" style="display:none">{{ $curso->Estado_Curso }}</td>
                        <td>
                            @foreach ($inscrito->user->files as $file)
                                @if ($inscrito->modo_Documento == "documento anexo")
                                    <a href="{{ asset($file->ruta) }}" class="btn btn-warning btn-xs">
                                        <span></span>Descargar
                                    </a>
                                @endif
                            @endforeach
                            @if (auth()->user()->alianza != 1 && $curso->Estado_Curso != "Cerrado por baja demanda" && $curso->Estado_Curso != "Entregado al centro")
                                <button class="gfgselect btn btn-danger btn-xs" data-bs-toggle="modal" data-bs-target="#staticBackdropdelete">
                                    <span></span>Borrar
                                </button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Modal de eliminación de inscrito -->
        <div class="modal fade" id="staticBackdropdelete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Eliminar Registro</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="delete" id="delete"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal de cierre de curso -->
        <div class="modal fade" id="staticBackdropcerrarCurso" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Cerrar Programa de Formación</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="estado modal-body">
                        {{-- <form method="POST" action="{{ route('cursos.cerrar') }}"> --}}
                        <form method="POST" action="">
                            @csrf
                            <div class="form-group">
                                <label for="nombrecurso">Programa de formación</label>
                                <input readonly type="text" required class="form-control" id="nombrecurso" name="nombrecurso" placeholder="Nombre persona enlace" value="{{ $curso->Nombre_Curso }}">
                            </div>
                            <div class="form-group">
                                <label for="inscritos">Inscritos</label>
                                <input readonly type="text" required class="form-control" id="inscritos" name="inscritos" placeholder="" value="{{ $inscritos }}">
                            </div>
                            <div class="form-group">
                                <label for="Estado">Estado</label>
                                <select type="text" required class="form-control select" id="Estado" name="Estado" placeholder="" value="">
                                    <option selected disabled value="">{{ $curso->Estado_Curso }}</option>
                                    <option value="Cerrar Por baja demanda">Cerrar por baja demanda</option>
                                </select>
                            </div>
                            <input hidden type="text" value="16" id="operacion" name="operacion">
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                @if ($curso->Estado_Curso != "Cerrado por baja demanda" && $curso->Estado_Curso != "Concertado acta")
                                    <button type="submit" class="btn btn-danger">Realizar operación</button>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection