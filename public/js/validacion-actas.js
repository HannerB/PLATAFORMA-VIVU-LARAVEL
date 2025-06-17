$(document).ready(function () {
    // Ver detalle del acta
    $('.ver-detalle').click(function () {
        const actaId = $(this).data('id');
        const $btn = $(this);

        // Mostrar loading
        $btn.prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i> Cargando...');

        $.ajax({
            url: `/actas/${actaId}/detalle`,
            method: 'GET',
            success: function (response) {
                if (response.success) {
                    mostrarDetalle(response.acta, response.cursos);
                }
            },
            error: function () {
                Swal.fire('Error', 'No se pudo cargar el detalle del acta', 'error');
            },
            complete: function () {
                $btn.prop('disabled', false).html('<i class="fa fa-eye"></i> Ver detalle');
            }
        });
    });

    // Mostrar detalle en modal
    function mostrarDetalle(acta, cursos) {
        let html = `
            <div class="modal fade" id="modalDetalle" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Detalle del Acta - ${acta.mes_concertacion}</h5>
                            <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <strong>Estado:</strong> 
                                    <span class="badge ${getEstadoBadgeClass(acta.estado)}">
                                        ${acta.estado}
                                    </span>
                                </div>
                                <div class="col-md-6">
                                    <strong>Vigencia:</strong> ${acta.vigencia}
                                </div>
                            </div>
                            
                            ${acta.validador ? `
                                <div class="alert alert-info">
                                    Validada por: ${acta.validador.nombres} ${acta.validador.apellidos}<br>
                                    Fecha: ${formatDate(acta.fecha_validacion)}
                                    ${acta.observaciones ? `<br>Observaciones: ${acta.observaciones}` : ''}
                                </div>
                            ` : ''}
                            
                            <h6>Cursos concertados (${cursos.length})</h6>
                            <div class="table-responsive">
                                <table class="table table-sm table-striped">
                                    <thead>
                                        <tr>
                                            <th>Municipio</th>
                                            <th>Centro</th>
                                            <th>Curso</th>
                                            <th>Estado</th>
                                            <th>Mes POA</th>
                                        </tr>
                                    </thead>
                                    <tbody>`;

        cursos.forEach(curso => {
            html += `
                <tr>
                    <td>${curso.Municipio_Curso}</td>
                    <td>${curso.Centro_Formacion}</td>
                    <td>${curso.Nombre_Curso}</td>
                    <td><span class="badge ${getCursoBadgeClass(curso.Estado_Curso)}">${curso.Estado_Curso}</span></td>
                    <td>${curso.Mes_Poa}</td>
                </tr>`;
        });

        html += `
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>`;

        // Remover modal anterior si existe
        $('#modalDetalle').remove();

        // Agregar y mostrar nuevo modal
        $('body').append(html);
        $('#modalDetalle').modal('show');

        // Limpiar al cerrar
        $('#modalDetalle').on('hidden.bs.modal', function () {
            $(this).remove();
        });
    }

    // Helpers
    function getEstadoBadgeClass(estado) {
        const classes = {
            'por validar': 'badge-warning',
            'Acta valida': 'badge-success',
            'Acta No valida': 'badge-danger'
        };
        return classes[estado] || 'badge-secondary';
    }

    function getCursoBadgeClass(estado) {
        const classes = {
            'registrado': 'badge-secondary',
            'Concertado acta': 'badge-info',
            'Activo': 'badge-success',
            'Cerrado': 'badge-danger'
        };
        return classes[estado] || 'badge-secondary';
    }

    function formatDate(dateString) {
        if (!dateString) return '';
        const date = new Date(dateString);
        return date.toLocaleDateString('es-CO') + ' ' + date.toLocaleTimeString('es-CO');
    }
});