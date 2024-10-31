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
                        <select class="form-select col-auto" id="filtro" name="filtro"
                            aria-label="Example select with button addon" required>
                            <option value="" selected>Seleccione</option>
                            <option value="1">Descargar Listado inscritos excel</option>
                            <option value="2">Generar / Actualizar Paquete inscritos</option>
                        </select>
                    </div>
                    <div class="ml-2">
                        <button class="btn btn-secondary" type="submit">Seleccionar</button>
                        @if (file_exists(public_path('archivos/Archivo' . $curso->id . '.zip')))
                            <a href="{{ asset('archivos/Archivo' . $curso->id . '.zip') }}" class="btn btn-success">
                                <i class="fa fa-download"></i> Descargar Paquete Inscritos
                            </a>
                        @endif
                        @if (auth()->user()->alianza != 1 &&
                                $curso->Estado_Curso != 'Cerrado por baja demanda' &&
                                $curso->Estado_Curso != 'Entregado al centro')
                            <button class="btn btn-warning" data-toggle="modal" data-target="#cerrarCursoModal"
                                type="button">
                                Cerrar Programa de formación
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        </form>

        <div class="card mt-4">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Lista de Inscritos</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="tabla" class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Residencia</th>
                                <th>Tipo documento</th>
                                <th>Documento</th>
                                <th>Nombres y apellidos</th>
                                <th>Teléfono</th>
                                <th>Correo</th>
                                <th>Tipo Población</th>
                                <th>Estado Sofia Plus</th>
                                <th width="200">Gestión</th>
                            </tr>
                            <tr>
                                <td colspan="9">
                                    <input id="buscar" type="text" class="form-control"
                                        placeholder="Filtrar registros..." />
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($curso->inscritos as $inscrito)
                                <tr>
                                    <td>{{ $inscrito->user->municipio }}</td>
                                    <td>{{ $inscrito->user->tipodocumento }}</td>
                                    <td>{{ $inscrito->user->documento }}</td>
                                    <td>{{ $inscrito->user->nombres }} {{ $inscrito->user->apellidos }}</td>
                                    <td>{{ $inscrito->user->telefono }}</td>
                                    <td>{{ $inscrito->user->email }}</td>
                                    <td>{{ $inscrito->user->tipoPoblacion }}</td>
                                    <td class="text-center">
                                        {{-- @if ($inscrito->user->noInscritosSofiaplus->isEmpty())
                                            <span class="badge badge-success">
                                                <i class="fa fa-check"></i> Inscrito
                                            </span>
                                        @else
                                            <span class="badge badge-danger">
                                                <i class="fa fa-times"></i> No Inscrito
                                            </span>
                                        @endif --}}
                                    </td>
                                    <td class="text-center">
                                        @foreach ($inscrito->user->files as $file)
                                            @if ($inscrito->modo_Documento == 'documento anexo')
                                                <a href="{{ asset($file->ruta) }}" class="btn btn-warning btn-sm"
                                                    title="Descargar documento">
                                                    <i class="fa fa-download"></i> Documento
                                                </a>
                                            @endif
                                        @endforeach

                                        {{-- @if (auth()->user()->alianza != 1 && $curso->Estado_Curso != 'Cerrado por baja demanda' && $curso->Estado_Curso != 'Entregado al centro') --}}
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#deleteModal{{ $inscrito->id_cursos_detalle }}"
                                            title="Eliminar inscrito">
                                            <i class="fa fa-trash"></i> Eliminar
                                        </button>
                                        {{-- @endif --}}
                                    </td>
                                </tr>
                                @include('partials.modals.gestion_curso2.inscritos_eliminar', [
                                    'inscrito' => $inscrito,
                                ])
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        @include('partials.modals.gestion_curso2.cerrar_curso', ['curso' => $curso])
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
