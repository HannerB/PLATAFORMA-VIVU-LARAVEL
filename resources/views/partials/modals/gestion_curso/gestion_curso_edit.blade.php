<div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">
                    <i class="fas fa-edit mr-2"></i>Editar Curso
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editForm" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id_poa" id="editIdPoa">

                    <div class="form-group">
                        <label for="editCentro_Formacion">
                            <i class="fas fa-building mr-1"></i>Centro de Formación
                        </label>
                        <select name="Centro_Formacion" id="editCentro_Formacion" class="form-control custom-select"
                            required>
                            <option value="">Seleccione...</option>
                            <option value="CENTRO DE COMERCIO Y SERVICIOS">CENTRO DE COMERCIO Y SERVICIOS</option>
                            <option value="CENTRO INDUSTRIAL Y DE AVIACION">CENTRO INDUSTRIAL Y DE AVIACION</option>
                            <option value="CENTRO NACIONAL COLOMBO ALEMAN">CENTRO NACIONAL COLOMBO ALEMAN</option>
                            <option value="CEDAGRO">CEDAGRO</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="editNivel_Formacion">
                            <i class="fas fa-graduation-cap mr-1"></i>Nivel de Formación
                        </label>
                        <select name="Nivel_Formacion" id="editNivel_Formacion" class="form-control custom-select"
                            required>
                            <option value="">Seleccione</option>
                            <option value="Formacion Complementaria">Formación Complementaria</option>
                            <option value="Formacion Titulada">Formación Titulada</option>
                            <option value="Certificacion por competencias Laborales">Certificación por competencias
                                Laborales</option>
                            <option value="Evento divulgacion Tecnologica">Evento divulgación Tecnológica</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="editNombre_Curso">
                            <i class="fas fa-book mr-1"></i>Nombre programa de Formación
                        </label>
                        <input type="text" class="form-control" id="editNombre_Curso" name="Nombre_Curso" required>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="editcategoria">
                                <i class="fas fa-tag mr-1"></i>Categoría
                            </label>
                            <select name="categoria" id="editcategoria" class="form-control custom-select" required>
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

                        <div class="form-group col-md-6">
                            <label for="editMes_Poa">
                                <i class="fas fa-calendar-alt mr-1"></i>Mes de ejecución
                            </label>
                            <select name="Mes_Poa" id="editMes_Poa" class="form-control custom-select" required>
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
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="editEstado_Curso">
                                <i class="fas fa-info-circle mr-1"></i>Estado del Curso
                            </label>
                            <select name="Estado_Curso" id="editEstado_Curso" class="form-control custom-select"
                                required>
                                <option value="">Seleccione</option>
                                <option value="En proceso">En proceso</option>
                                <option value="Finalizado">Finalizado</option>
                                <option value="Cancelado">Cancelado</option>
                                <option value="Cerrado por baja demanda">Cerrado por baja demanda</option>
                                <option value="Cerrado por alta demanda">Cerrado por alta demanda</option>
                                <option value="registrado">Registrado</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="editcupo">
                                <i class="fas fa-users mr-1"></i>Cupo
                            </label>
                            <input type="number" class="form-control" id="editcupo" name="cupo" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="editDireccion">
                            <i class="fas fa-map-marker-alt mr-1"></i>Dirección
                        </label>
                        <input type="text" class="form-control" id="editDireccion" name="Direccion" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    <i class="fas fa-times mr-2"></i>Cancelar
                </button>
                <button type="submit" form="editForm" class="btn btn-primary">
                    <i class="fas fa-save mr-2"></i>Guardar cambios
                </button>
            </div>
        </div>
    </div>
</div>

<style>
    .modal-content {
        border-radius: 10px;
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
    }

    .modal-header {
        background: linear-gradient(45deg, #2196F3, #1976D2);
        color: white;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    .modal-title {
        font-weight: bold;
    }

    .close {
        color: white;
        text-shadow: none;
    }

    .close:hover {
        color: #eee;
    }

    .modal-body {
        padding: 1.5rem;
    }

    .form-control {
        border-radius: 5px;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        box-shadow: 0 0 0 0.2rem rgba(33, 150, 243, 0.25);
    }

    label {
        font-weight: bold;
        margin-bottom: 0.5rem;
    }

    .modal-footer {
        border-top: none;
        padding: 1rem 1.5rem;
        background: #f8f9fa;
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
    }

    .btn {
        border-radius: 5px;
        padding: 0.5rem 1.25rem;
        font-weight: bold;
        transition: all 0.3s ease;
    }

    .btn-secondary {
        background: white;
        color: #6c757d;
        border-color: #6c757d;
    }

    .btn-secondary:hover {
        background: #6c757d;
        color: white;
    }

    .btn-primary {
        background: #2196F3;
        border-color: #2196F3;
    }

    .btn-primary:hover {
        background: #1976D2;
        border-color: #1976D2;
    }
</style>

<script>
    $(document).ready(function() {
        $('#staticBackdrop').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var row = button.closest('tr');
            var id = row.find('.gfgid').text();

            // Actualizar la acción del formulario usando la ruta nombrada
            var form = $('#editForm');
            form.attr('action', "{{ route('gestion-curso.update', '') }}/" + id);

            // Obtener datos de la fila y llenar el formulario
            $('#editCentro_Formacion').val(row.find('.gfgCentro_Formacion').text().trim());
            $('#editNivel_Formacion').val(row.find('.gfgNivel_Formacion').text().trim());
            $('#editNombre_Curso').val(row.find('.gfgNombre_Curso').text().trim());
            $('#editcategoria').val(row.find('.gfgcategoria').text().trim());
            $('#editMes_Poa').val(row.find('.gfgMes_Poa').text().trim());
            $('#editEstado_Curso').val(row.find('.gfgEstado_Curso').text().trim());
            $('#editcupo').val(row.find('.gfgcupo').text().trim());
            $('#editDireccion').val(row.find('.gfgdireccion').text().trim());
        });
    });
</script>
