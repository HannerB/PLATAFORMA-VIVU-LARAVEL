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

    .table th {
        background-color: #f8f9fa;
    }

    .form-group textarea {
        resize: none;
        height: 100px;
    }
</style>

<div class="modal fade" id="modalConcertacion{{ $id }}" tabindex="-1" role="dialog"
    aria-labelledby="modalLabel{{ $id }}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel{{ $id }}">Acta de concertación</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{-- Input oculto para mantener el ID de la concertación --}}
                <input type="text" id="cedula_{{ $id }}" hidden value="{{ $id }}">

                {{-- Contenedor para mensajes de actas no válidas o válidas --}}
                @if ($estado == 'Acta No valida' || $estado == 'Acta valida')
                    <div class="form-group">
                        <label>Mensaje</label>
                        <textarea class="form-control" readonly>No se puede modificar esta acta, ya fue revisada y su estado es "{{ $estado }}"</textarea>
                    </div>
                @else
                    {{-- Contenedor para la tabla de cursos --}}
                    <div id="cursos_ver_{{ $id }}"></div>
                    <div id="resultado_{{ $id }}" class="mt-3">
                        @if (isset($cursosPorConcertacion[$id]) && count($cursosPorConcertacion[$id]) > 0)
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Municipio</th>
                                            <th>Centro</th>
                                            <th>Nombre Curso</th>
                                            <th>Estado</th>
                                            <th>Mes POA</th>
                                            <th>Categoría</th>
                                            <th>Cupo</th>
                                            <th>Jornada</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cursosPorConcertacion[$id] as $curso)
                                            <tr>
                                                <td>{{ $curso->Municipio_Curso }}</td>
                                                <td>{{ $curso->Centro_Formacion }}</td>
                                                <td>{{ $curso->Nombre_Curso }}</td>
                                                <td>
                                                    <span
                                                        class="badge {{ $curso->Estado_Curso == 'Concertado acta' ? 'badge-success' : 'badge-warning' }}">
                                                        {{ $curso->Estado_Curso }}
                                                    </span>
                                                </td>
                                                <td>{{ $curso->Mes_Poa }}</td>
                                                <td>{{ $curso->categoria }}</td>
                                                <td>{{ $curso->cupo }}</td>
                                                <td>{{ $curso->Jornada_Curso }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="alert alert-info">
                                No hay cursos asociados a esta concertación
                            </div>
                        @endif
                    </div>
                @endif
            </div>
            <div class="modal-footer">
                @if ($estado != 'Acta No valida' && $estado != 'Acta valida')
                    <button type="button" class="btn btn-primary">
                        Total cursos: {{ isset($cursosPorConcertacion[$id]) ? count($cursosPorConcertacion[$id]) : 0 }}
                    </button>
                @endif
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#modalConcertacion{{ $id }}').on('show.bs.modal', function() {
                var estado = '{{ $estado }}';
                var id = '{{ $id }}';
                var resultadoDiv = $('#resultado_' + id);

                // Solo cargar los cursos si el acta no está validada
                if (estado !== 'Acta No valida' && estado !== 'Acta valida') {
                    resultadoDiv.html('<div class="text-center"><div class="loading-spinner"></div></div>');

                    $.ajax({
                        url: '/concertaciones/' + id + '/cursos',
                        method: 'GET',
                        success: function(response) {
                            if (response.success) {
                                let html = '<div class="table-responsive">';
                                html += '<table class="table table-striped table-hover">';
                                html += '<thead class="thead-light"><tr>';
                                html += '<th>Municipio</th>';
                                html += '<th>Centro</th>';
                                html += '<th>Nombre Curso</th>';
                                html += '<th>Estado</th>';
                                html += '<th>Mes POA</th>';
                                html += '<th>Categoría</th>';
                                html += '<th>Cupo</th>';
                                html += '<th>Jornada</th>';
                                html += '</tr></thead>';
                                html += '<tbody>';

                                response.data.forEach(function(curso) {
                                    html += '<tr>';
                                    html += `<td>${curso.Municipio_Curso || ''}</td>`;
                                    html += `<td>${curso.Centro_Formacion || ''}</td>`;
                                    html += `<td>${curso.Nombre_Curso || ''}</td>`;
                                    html +=
                                        `<td><span class="badge ${curso.Estado_Curso === 'Concertado acta' ? 'badge-success' : 'badge-warning'}">${curso.Estado_Curso || ''}</span></td>`;
                                    html += `<td>${curso.Mes_Poa || ''}</td>`;
                                    html += `<td>${curso.categoria || ''}</td>`;
                                    html += `<td>${curso.cupo || ''}</td>`;
                                    html += `<td>${curso.Jornada_Curso || ''}</td>`;
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
