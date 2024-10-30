@foreach ($consulta as $curso)
    <div class="modal fade" id="editModal{{ $curso->id_Gestion_Cursos }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Curso</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('gestion-cursos.actualizar', $curso->id_Gestion_Cursos) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Centro de Formación</label>
                            <select name="Centro_Formacion" class="form-select" required>
                                <option value="{{ $curso->Centro_Formacion }}">{{ $curso->Centro_Formacion }}</option>
                                <option value="CENTRO DE COMERCIO Y SERVICIOS">CENTRO DE COMERCIO Y SERVICIOS</option>
                                <option value="CENTRO INDUSTRIAL Y DE AVIACION">CENTRO INDUSTRIAL Y DE AVIACION</option>
                                <option value="CENTRO NACIONAL COLOMBO ALEMAN">CENTRO NACIONAL COLOMBO ALEMAN</option>
                                <option value="CEDAGRO">CEDAGRO</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Nivel de Formación</label>
                            <select name="Nivel_Formacion" class="form-select" required>
                                <option value="{{ $curso->Nivel_Formacion }}">{{ $curso->Nivel_Formacion }}</option>
                                <option value="Formacion Complementaria">Formación Complementaria</option>
                                <option value="Formacion Titulada">Formación Titulada</option>
                                <option value="Certificacion por competencias Laborales">Certificación por competencias
                                    Laborales</option>
                                <option value="Evento divulgacion Tecnologica">Evento divulgación Tecnológica</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Nombre programa de Formación</label>
                            <input type="text" class="form-control" name="Nombre_Curso"
                                value="{{ $curso->Nombre_Curso }}" required>
                        </div>

                        <div class="form-group">
                            <label>Categoría</label>
                            <select name="categoria" class="form-select" required>
                                <option value="{{ $curso->categoria }}">{{ $curso->categoria }}</option>
                                <option value="Tecnología">Tecnología</option>
                                <option value="Salud Ocupacional">Salud Ocupacional</option>
                                <!-- Añadir más opciones según necesites -->
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Mes de ejecución</label>
                            <select name="Mes_Poa" class="form-select" required>
                                <option value="{{ $curso->Mes_Poa }}">{{ $curso->Mes_Poa }}</option>
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

                        <div class="form-group">
                            <label>Estado del Curso</label>
                            <select name="Estado_Curso" class="form-select" required>
                                <option value="{{ $curso->Estado_Curso }}">{{ $curso->Estado_Curso }}</option>
                                <option value="Activo">Activo</option>
                                <option value="Inactivo">Inactivo</option>
                                <option value="Concertado">Concertado</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Dirección</label>
                            <input type="text" class="form-control" name="Direccion" value="{{ $curso->Direccion }}"
                                required>
                        </div>

                        <div class="form-group">
                            <label>Cupo</label>
                            <input type="number" class="form-control" name="cupo" value="{{ $curso->cupo }}"
                                required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
