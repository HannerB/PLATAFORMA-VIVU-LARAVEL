<div class="modal fade" id="deleteModal{{ $asignacion->id }}" tabindex="-1" role="dialog"
    aria-labelledby="deleteModalLabel{{ $asignacion->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel{{ $asignacion->id }}">Eliminar Registro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('asignar-municipio.destroy', $asignacion->id) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <div class="form-group">
                        <label>Municipio</label>
                        <input type="text" class="form-control" value="{{ $asignacion->municipio }}" readonly>
                    </div>

                    <div class="form-group">
                        <label>Orientador</label>
                        <input type="text" class="form-control"
                            value="{{ $asignacion->user->nombres }} {{ $asignacion->user->apellidos }}" readonly>
                    </div>

                    <div class="form-group">
                        <label>Periodo</label>
                        <input type="text" class="form-control" value="{{ $asignacion->periodo }}" readonly>
                    </div>

                    <div class="alert alert-danger mt-3">
                        <p class="mb-0">¿Está seguro de que desea eliminar este registro?</p>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>