<div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-edit mr-2"></i>Editar Curso
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editForm" action="{{ route('gestion-cursos.update', $gestionCurso->id_Gestion_Cursos ?? '') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="editCentro_Formacion">
                            <i class="fas fa-building mr-1"></i>Centro de Formación
                        </label>
                        <select name="Centro_Formacion" id="editCentro_Formacion" class="form-control custom-select" required>
                            <option value="">Seleccione...</option>
                            <option value="CENTRO DE COMERCIO Y SERVICIOS" {{ $curso->Centro_Formacion == 'CENTRO DE COMERCIO Y SERVICIOS' ? 'selected' : '' }}>CENTRO DE COMERCIO Y SERVICIOS</option>
                            <option value="CENTRO INDUSTRIAL Y DE AVIACION" {{ $curso->Centro_Formacion == 'CENTRO INDUSTRIAL Y DE AVIACION' ? 'selected' : '' }}>CENTRO INDUSTRIAL Y DE AVIACION</option>
                            <option value="CENTRO NACIONAL COLOMBO ALEMAN" {{ $curso->Centro_Formacion == 'CENTRO NACIONAL COLOMBO ALEMAN' ? 'selected' : '' }}>CENTRO NACIONAL COLOMBO ALEMAN</option>
                            <option value="CEDAGRO" {{ $curso->Centro_Formacion == 'CEDAGRO' ? 'selected' : '' }}>CEDAGRO</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="editNombre_Curso">
                            <i class="fas fa-book mr-1"></i>Nombre programa de Formación
                        </label>
                        <input type="text" class="form-control" id="editNombre_Curso" name="Nombre_Curso" value="{{ $curso->Nombre_Curso ?? '' }}" required>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="editcategoria">
                                <i class="fas fa-tag mr-1"></i>Categoría
                            </label>
                            <select name="categoria" id="editcategoria" class="form-control custom-select" required>
                                <option value="">Seleccione</option>
                                <option value="Tecnología" {{ $curso->categoria == 'Tecnología' ? 'selected' : '' }}>Tecnología</option>
                                <option value="Salud Ocupacional" {{ $curso->categoria == 'Salud Ocupacional' ? 'selected' : '' }}>Salud Ocupacional</option>
                                <option value="Emprendimiento" {{ $curso->categoria == 'Emprendimiento' ? 'selected' : '' }}>Emprendimiento</option>
                                <option value="Confección" {{ $curso->categoria == 'Confección' ? 'selected' : '' }}>Confección</option>
                                <option value="Cocina" {{ $curso->categoria == 'Cocina' ? 'selected' : '' }}>Cocina</option>
                                <option value="Gestión" {{ $curso->categoria == 'Gestión' ? 'selected' : '' }}>Gestión</option>
                                <option value="Artesanías" {{ $curso->categoria == 'Artesanías' ? 'selected' : '' }}>Artesanías</option>
                                <option value="Ética" {{ $curso->categoria == 'Ética' ? 'selected' : '' }}>Ética</option>
                                <option value="Pedagogía" {{ $curso->categoria == 'Pedagogía' ? 'selected' : '' }}>Pedagogía</option>
                                <option value="Construcción" {{ $curso->categoria == 'Construcción' ? 'selected' : '' }}>Construcción</option>
                                <option value="Belleza" {{ $curso->categoria == 'Belleza' ? 'selected' : '' }}>Belleza</option>
                                <option value="Agricultura" {{ $curso->categoria == 'Agricultura' ? 'selected' : '' }}>Agricultura</option>
                                <option value="LGBTIQ" {{ $curso->categoria == 'LGBTIQ' ? 'selected' : '' }}>LGBTIQ</option>
                                <option value="Discapacidad" {{ $curso->categoria == 'Discapacidad' ? 'selected' : '' }}>Discapacidad</option>
                                <option value="Logistica" {{ $curso->categoria == 'Logistica' ? 'selected' : '' }}>Logística</option>
                                <option value="Etnias" {{ $curso->categoria == 'Etnias' ? 'selected' : '' }}>Etnias</option>
                                <option value="Ingles" {{ $curso->categoria == 'Ingles' ? 'selected' : '' }}>Inglés</option>
                                <option value="Electricidad" {{ $curso->categoria == 'Electricidad' ? 'selected' : '' }}>Electricidad</option>
                            </select>
                        </div>
                        
                        <div class="form-group col-md-6">  
                            <label for="editMes_Poa">
                                <i class="fas fa-calendar-alt mr-1"></i>Mes de ejecución
                            </label>
                            <select name="Mes_Poa" id="editMes_Poa" class="form-control custom-select" required>
                                <option value="">Seleccione</option>
                                <option value="Enero" {{ $curso->Mes_Poa == 'Enero' ? 'selected' : '' }}>Enero</option>
                                <option value="Febrero" {{ $curso->Mes_Poa == 'Febrero' ? 'selected' : '' }}>Febrero</option>
                                <option value="Marzo" {{ $curso->Mes_Poa == 'Marzo' ? 'selected' : '' }}>Marzo</option>
                                <option value="Abril" {{ $curso->Mes_Poa == 'Abril' ? 'selected' : '' }}>Abril</option>
                                <option value="Mayo" {{ $curso->Mes_Poa == 'Mayo' ? 'selected' : '' }}>Mayo</option>
                                <option value="Junio" {{ $curso->Mes_Poa == 'Junio' ? 'selected' : '' }}>Junio</option>
                                <option value="Julio" {{ $curso->Mes_Poa == 'Julio' ? 'selected' : '' }}>Julio</option>
                                <option value="Agosto" {{ $curso->Mes_Poa == 'Agosto' ? 'selected' : '' }}>Agosto</option>
                                <option value="Septiembre" {{ $curso->Mes_Poa == 'Septiembre' ? 'selected' : '' }}>Septiembre</option>
                                <option value="Octubre" {{ $curso->Mes_Poa == 'Octubre' ? 'selected' : '' }}>Octubre</option>
                                <option value="Noviembre" {{ $curso->Mes_Poa == 'Noviembre' ? 'selected' : '' }}>Noviembre</option>
                                <option value="Diciembre" {{ $curso->Mes_Poa == 'Diciembre' ? 'selected' : '' }}>Diciembre</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="editEstado_Curso">
                                <i class="fas fa-info-circle mr-1"></i>Estado del Curso
                            </label>
                            <select name="Estado_Curso" id="editEstado_Curso" class="form-control custom-select" required>
                                <option value="">Seleccione</option>
                                <option value="En proceso" {{ $curso->Estado_Curso == 'En proceso' ? 'selected' : '' }}>En proceso</option>
                                <option value="Finalizado" {{ $curso->Estado_Curso == 'Finalizado' ? 'selected' : '' }}>Finalizado</option>
                                <option value="Cancelado" {{ $curso->Estado_Curso == 'Cancelado' ? 'selected' : '' }}>Cancelado</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="editcupo">
                                <i class="fas fa-users mr-1"></i>Cupo
                            </label>
                            <input type="number" class="form-control" id="editcupo" name="cupo" value="{{ $curso->cupo ?? '' }}" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="editDireccion">
                            <i class="fas fa-map-marker-alt mr-1"></i>Dirección
                        </label>
                        <input type="text" class="form-control" id="editDireccion" name="Direccion" value="{{ $curso->Direccion ?? '' }}" required>
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