<div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">
                    <i class="fa fa-edit mr-2"></i>Editar Curso
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-4">
                <form id="editForm" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="editCentro_Formacion">
                                    <i class="fa fa-building mr-1"></i>Centro de Formación
                                </label>
                                <select name="Centro_Formacion" id="editCentro_Formacion" class="form-control" required>
                                    <option value="">Seleccione...</option>
                                    <option value="CENTRO DE COMERCIO Y SERVICIOS">CENTRO DE COMERCIO Y SERVICIOS
                                    </option>
                                    <option value="CENTRO INDUSTRIAL Y DE AVIACION">CENTRO INDUSTRIAL Y DE AVIACION
                                    </option>
                                    <option value="CENTRO NACIONAL COLOMBO ALEMAN">CENTRO NACIONAL COLOMBO ALEMAN
                                    </option>
                                    <option value="CEDAGRO">CEDAGRO</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="editNivel_Formacion">
                                    <i class="fa fa-graduation-cap mr-1"></i>Nivel de Formación
                                </label>
                                <select name="Nivel_Formacion" id="editNivel_Formacion" class="form-control" required>
                                    <option value="">Seleccione</option>
                                    <option value="Formacion Complementaria">Formación Complementaria</option>
                                    <option value="Formacion Titulada">Formación Titulada</option>
                                    <option value="Certificacion por competencias Laborales">Certificación por
                                        competencias Laborales</option>
                                    <option value="Evento divulgacion Tecnologica">Evento divulgación Tecnológica
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="editNombre_Curso">
                            <i class="fa fa-book mr-1"></i>Nombre programa de Formación
                        </label>
                        <input type="text" class="form-control" id="editNombre_Curso" name="Nombre_Curso" required>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="editcategoria">
                                    <i class="fa fa-tag mr-1"></i>Categoría
                                </label>
                                <select name="categoria" id="editcategoria" class="form-control" required>
                                    <option value="">Seleccione</option>
                                    <option value="Tecnología">Tecnología</option>
                                    <option value="Salud Ocupacional">Salud Ocupacional</option>
                                    <option value="Emprendimiento">Emprendimiento</option>
                                    <option select value="Confección">Confección</option>
                                    <option select value="Cocina">Cocina</option>
                                    <option select value="Gestión">Gestión</option>
                                    <option select value="Artesanías">Artesanías</option>
                                    <option select value="Ética">Ética</option>
                                    <option select value="Pedagogía">Pedagogía</option>
                                    <option select value="Construcción">Construcción</option>
                                    <option select value="Belleza">Belleza</option>
                                    <option select value="Agricultura">Agricultura</option>
                                    <option select value="LGBTIQ">LGBTIQ</option>
                                    <option select value="Discapacidad">Discapacidad</option>
                                    <option select value="Logistica">Logistica</option>
                                    <option select value="Etnias">Etnias</option>
                                    <option select value="Ingles">Ingles</option>
                                    <option select value="Electricidad">Electricidad</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="editMes_Poa">
                                    <i class="fa fa-calendar mr-1"></i>Mes de ejecución
                                </label>
                                <select name="Mes_Poa" id="editMes_Poa" class="form-control" required>
                                    <option value="">Seleccione</option>
                                    <option value="Tecnología">Tecnología</option>
                                    <option value="Salud Ocupacional">Salud Ocupacional</option>
                                    <option value="Emprendimiento">Emprendimiento</option>
                                    <option select value="Confección">Confección</option>
                                    <option select value="Cocina">Cocina</option>
                                    <option select value="Gestión">Gestión</option>
                                    <option select value="Artesanías">Artesanías</option>
                                    <option select value="Ética">Ética</option>
                                    <option select value="Pedagogía">Pedagogía</option>
                                    <option select value="Construcción">Construcción</option>
                                    <option select value="Belleza">Belleza</option>
                                    <option select value="Agricultura">Agricultura</option>
                                    <option select value="LGBTIQ">LGBTIQ</option>
                                    <option select value="Discapacidad">Discapacidad</option>
                                    <option select value="Logistica">Logistica</option>
                                    <option select value="Etnias">Etnias</option>
                                    <option select value="Ingles">Ingles</option>
                                    <option select value="Electricidad">Electricidad</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="editEstado_Curso">
                                    <i class="fa fa-check-circle mr-1"></i>Estado del Curso
                                </label>
                                <select name="Estado_Curso" id="editEstado_Curso" class="form-control" required>
                                    <option value="">Seleccione</option>
                                    <option value="En proceso">En proceso</option>
                                    <option value="Finalizado">Finalizado</option>
                                    <option value="Cancelado">Cancelado</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="editcupo">
                                    <i class="fa fa-users mr-1"></i>Cupo
                                </label>
                                <input type="number" class="form-control" id="editcupo" name="cupo" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="editDireccion">
                            <i class="fa fa-map-marker mr-1"></i>Dirección
                        </label>
                        <input type="text" class="form-control" id="editDireccion" name="Direccion" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    <i class="fa fa-times mr-2"></i>Cancelar
                </button>
                <button type="submit" form="editForm" class="btn btn-primary">
                    <i class="fa fa-save mr-2"></i>Guardar cambios
                </button>
            </div>
        </div>
    </div>
</div>

<style>
    .modal-content {
        border: none;
        border-radius: 0.5rem;
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
    }

    .modal-header {
        border-top-left-radius: 0.5rem;
        border-top-right-radius: 0.5rem;
    }

    .form-control {
        border-radius: 0.25rem;
        border: 1px solid #ced4da;
        padding: 0.5rem 0.75rem;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .form-control:focus {
        border-color: #80bdff;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, .25);
    }

    .btn {
        border-radius: 0.25rem;
        padding: 0.5rem 1rem;
    }

    .close {
        text-shadow: none;
        opacity: 1;
    }

    .close:hover {
        opacity: 0.75;
        color: white;
    }
</style>
