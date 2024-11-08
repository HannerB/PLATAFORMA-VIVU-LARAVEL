<div class="modal fade" id="editModal-{{ $alianza->id_alianza }}" tabindex="-1" role="dialog"
    aria-labelledby="editModalLabel-{{ $alianza->id_alianza }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel-{{ $alianza->id_alianza }}">Actualizar Registro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('alianza-municipio.update', $alianza->id_alianza) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="municipio-{{ $alianza->id_alianza }}">Municipio</label>
                        <select name="municipio" class="form-control" disabled>
                            <option value="{{ $alianza->municipio }}" selected>{{ $alianza->municipio }}</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Enlace</label>
                        <div class="input-group">
                            <input type="text" class="form-control"
                                value="{{ $alianza->nombres }} {{ $alianza->apellidos }}" disabled>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Periodo</label>
                        <input type="text" class="form-control" value="{{ $alianza->periodo }}" disabled>
                    </div>

                    <div class="form-group">
                        <label for="estado-{{ $alianza->id_alianza }}">Estado</label>
                        <select name="estado" id="estado-{{ $alianza->id_alianza }}" class="form-control" required>
                            <option value="{{ $alianza->estado }}" selected>{{ $alianza->estado }}</option>
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
