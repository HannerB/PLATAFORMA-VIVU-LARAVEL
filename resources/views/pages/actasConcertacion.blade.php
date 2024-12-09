@extends('layouts.app')

@section('content')
    <style>
        .loading-spinner {
            display: inline-block;
            width: 40px;
            height: 40px;
            border: 3px solid rgba(0, 0, 0, .3);
            border-radius: 50%;
            border-top-color: #000;
            animation: spin 1s ease-in-out infinite;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        .modal-header {
            background-color: #f8f9fa;
            border-bottom: 1px solid #dee2e6;
        }

        .table-responsive {
            margin-top: 1rem;
        }

        .alert {
            margin-top: 1rem;
        }
    </style>

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
                            <td class="gfgmes_concertacion">{{ $concertacion->mes_concertacion }}</td>
                            <td class="gfgvigencia">{{ $concertacion->vigencia }}</td>
                            <td class="gfgorientador">{{ $concertacion->nombres }} {{ $concertacion->apellidos }}</td>
                            <td class="gfgorientador">{{ $concertacion->Municipio_Curso }}</td>
                            <td class="gfgorientador">{{ $concertacion->Nombre_Poa }}</td>
                            <td class="gfgestado">{{ $concertacion->estado }}</td>
                            <td class="gfgformaciones">{{ $formaciones[$concertacion->id_file_concertaciones] }}</td>
                            <td>
                                <a href="{{ asset('storage/concertaciones/' . $concertacion->ruta) }}"
                                    class="gfgdownload btn btn-danger btn-xs">
                                    <span></span>Descargar
                                </a>
                                <button class="gfgselect btn btn-warning btn-xs"
                                    data-concertacion-id="{{ $concertacion->id_file_concertaciones }}" data-toggle="modal"
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

    @foreach ($concertaciones as $concertacion)
        @include('partials.modals.concertaciones.detalle', [
            'id' => $concertacion->id_file_concertaciones,
            'estado' => $concertacion->estado,
        ])
    @endforeach
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            // Búsqueda en tabla
            var busqueda = document.getElementById('buscar');
            var table = document.getElementById("tabla").tBodies[0];

            buscaTabla = function() {
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

            // Carga dinámica de cursos
            $('.gfgselect').click(function() {
                var concertacionId = $(this).data('concertacion-id');
                var estado = $(this).closest('tr').find('.gfgestado').text().trim();
                var resultadoDiv = $('#resultado_' + concertacionId);

                if (estado === "Acta No valida" || estado === "Acta valida") {
                    resultadoDiv.html(`
                <div class="form-group">
                    <label>Mensaje</label>
                    <textarea class="form-control" readonly>No se puede modificar esta acta, ya fue revisada y su estado es "${estado}"</textarea>
                </div>
            `);
                } else {
                    resultadoDiv.html('<div class="text-center"><div class="loading-spinner"></div></div>');

                    $.ajax({
                        url: '/concertaciones/' + concertacionId + '/cursos',
                        method: 'GET',
                        success: function(response) {
                            if (response.success) {
                                let html = '<div class="table-responsive">';
                                html += '<table class="table table-striped">';
                                html += '<thead><tr>';
                                html += '<th>Municipio</th>';
                                html += '<th>Centro</th>';
                                html += '<th>Nombre Curso</th>';
                                html += '<th>Estado</th>';
                                html += '<th>Mes POA</th>';
                                html += '<th>Categoría</th>';
                                html += '</tr></thead>';
                                html += '<tbody>';

                                response.data.forEach(function(curso) {
                                    html += '<tr>';
                                    html += `<td>${curso.Municipio_Curso || ''}</td>`;
                                    html += `<td>${curso.Centro_Formacion || ''}</td>`;
                                    html += `<td>${curso.Nombre_Curso || ''}</td>`;
                                    html += `<td>${curso.Estado_Curso || ''}</td>`;
                                    html += `<td>${curso.Mes_Poa || ''}</td>`;
                                    html += `<td>${curso.categoria || ''}</td>`;
                                    html += '</tr>';
                                });

                                html += '</tbody></table></div>';
                                resultadoDiv.html(html);
                            } else {
                                resultadoDiv.html(
                                    `<div class="alert alert-info">${response.message}</div>`
                                    );
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('Error:', error);
                            resultadoDiv.html(
                                '<div class="alert alert-danger">Error al cargar los cursos. Por favor, intente nuevamente.</div>'
                            );
                        }
                    });
                }
            });
        });
    </script>
@endpush
