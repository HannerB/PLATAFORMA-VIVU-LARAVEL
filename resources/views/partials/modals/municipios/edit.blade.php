<div class="modal fade" id="editModal{{ $asignacion->id }}" tabindex="-1" role="dialog"
    aria-labelledby="editModalLabel{{ $asignacion->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('asignar-municipio.update', $asignacion->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel{{ $asignacion->id }}">Actualizar Registro</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label>Municipio</label>
                        <select name="municipio" class="form-control" required>
                            <option value="{{ $asignacion->municipio }}">{{ $asignacion->municipio }}</option>
                            @foreach (['BARANOA', 'BARRANQUILLA', 'CAMPO DE LA CRUZ', 'CANDELARIA', 'GALAPA', 'JUAN DE ACOSTA', 'LURUACO', 'MALAMBO', 'MANATÍ', 'PALMAR DE VARELA', 'PIOJO', 'POLONUEVO', 'PONEDERA', 'PUERTO COLOMBIA', 'REPELÓN', 'SABANAGRANDE', 'SABANALARGA', 'SANTA LUCÍA', 'SANTO TOMÁS', 'SOLEDAD', 'SUÁN', 'TUBARA', 'USIACURI'] as $mun)
                                @if ($mun != $asignacion->municipio)
                                    <option value="{{ $mun }}">{{ $mun }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label>Orientador</label>
                        <input type="text" class="form-control"
                            value="{{ $asignacion->user->nombres }} {{ $asignacion->user->apellidos }}" disabled>
                    </div>

                    <div class="form-group mb-3">
                        <label>Periodo</label>
                        <input type="text" class="form-control" name="periodo" value="{{ $asignacion->periodo }}"
                            required>
                    </div>

                    <div class="form-group">
                        <label>Estado</label>
                        <select name="estado" class="form-control" required>
                            <option value="{{ $asignacion->estado }}">{{ $asignacion->estado }}</option>
                            <option value="activo">activo</option>
                            <option value="inactivo">inactivo</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>
