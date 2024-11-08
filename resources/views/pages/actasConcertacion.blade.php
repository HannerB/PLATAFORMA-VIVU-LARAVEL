@extends('layouts.app')

@section('content')
    <div class="container">
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

        <div class="table-responsive">
            <table id="tabla" class="table table-striped">
                <thead>
                    <tr>
                        <th style="width:100px">Mes de concertación</th>
                        <th style="width:80px">Periodo</th>
                        <th style="width:100px">Orientador</th>
                        <th style="width:100px">Municipio</th>
                        <th style="width:150px">Poa</th>
                        <th style="width:150px">Estado</th>
                        <th style="width:80px">Formaciones</th>
                        <th style="width:200px">Gestión</th>
                    </tr>
                    <tr>
                        <td colspan="8">
                            <input id="buscar" type="text" class="form-control" placeholder="Filtrar" />
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($concertaciones as $concertacion)
                        <tr>
                            <td>{{ $concertacion->mes_concertacion }}</td>
                            <td>{{ $concertacion->vigencia }}</td>
                            <td>{{ $concertacion->nombres }} {{ $concertacion->apellidos }}</td>
                            <td>{{ $concertacion->Municipio_Curso }}</td>
                            <td>{{ $concertacion->Nombre_Poa }}</td>
                            <td>{{ $concertacion->estado }}</td>
                            <td>{{ $formaciones[$concertacion->id_file_concertaciones] }}</td>
                            <td>
                                <a href="{{ asset($concertacion->ruta) }}" class="btn btn-danger btn-xs">
                                    <span></span>Descargar
                                </a>
                                <button type="button" class="btn btn-warning btn-xs" data-toggle="modal"
                                    data-target="#modalConcertacion{{ $concertacion->id_file_concertaciones }}">
                                    <span></span>Ver detalle
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- Incluir modales al final del contenido --}}
    @foreach ($concertaciones as $concertacion)
        @include('partials.modals.concertaciones.detalle', [
            'id' => $concertacion->id_file_concertaciones,
            'estado' => $concertacion->estado,
            'cursosPorConcertacion' => $cursosPorConcertacion,
        ])
    @endforeach
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $("#buscar").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#tabla tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
@endpush
