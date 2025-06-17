<div class="modal fade" id="modalValidarActa{{ $acta->id_file_concertaciones }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('actas.validar', $acta->id_file_concertaciones) }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Validar Acta de Concertación</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if($acta->puedeSerModificada())
                    <div class="form-group">
                        <label>Estado del Acta</label>
                        <select name="estado" class="form-control" required>
                            <option value="">Seleccione...</option>
                            <option value="Acta valida">Acta válida</option>
                            <option value="Acta No valida">Acta no válida</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Observaciones</label>
                        <textarea name="observaciones" class="form-control" rows="3"></textarea>
                    </div>

                    <div class="alert alert-info">
                        <strong>Nota:</strong>
                        <ul class="mb-0">
                            <li>Si valida el acta, los cursos pasarán a estado "Activo"</li>
                            <li>Si rechaza el acta, los cursos volverán a estado "Registrado"</li>
                        </ul>
                    </div>
                    @else
                    <div class="alert alert-warning">
                        Esta acta ya fue validada con estado: <strong>{{ $acta->estado }}</strong>
                        @if($acta->observaciones)
                        <br>Observaciones: {{ $acta->observaciones }}
                        @endif
                        @if($acta->validador)
                        <br>Validada por: {{ $acta->validador->nombres }} {{ $acta->validador->apellidos }}
                        <br>Fecha: {{ $acta->fecha_validacion->format('d/m/Y H:i') }}
                        @endif
                    </div>
                    @endif
                </div>
                <div class="modal-footer">
                    @if($acta->puedeSerModificada() && auth()->user()->canValidateActas())
                    <button type="submit" class="btn btn-primary">Validar Acta</button>
                    @endif
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Botones en la tabla de actas -->
<td>
    @if($acta->estaValidada())
    <a href="{{ route('actas.descargar', $acta->id_file_concertaciones) }}"
        class="btn btn-success btn-sm">
        <i class="fa fa-download"></i> Descargar
    </a>
    @else
    <button class="btn btn-secondary btn-sm" disabled>
        <i class="fa fa-download"></i> No disponible
    </button>
    @endif

    @can('validate-actas')
    <button class="btn btn-warning btn-sm"
        data-toggle="modal"
        data-target="#modalValidarActa{{ $acta->id_file_concertaciones }}">
        <i class="fa fa-check"></i> Validar
    </button>
    @endcan

    <button class="btn btn-info btn-sm ver-detalle"
        data-id="{{ $acta->id_file_concertaciones }}">
        <i class="fa fa-eye"></i> Ver detalle
    </button>
</td>