<div class="modal fade" id="deleteModal{{ $asignacion->id }}" tabindex="-1" role="dialog"
    aria-labelledby="deleteModalLabel{{ $asignacion->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('asignar-municipio.destroy', $asignacion->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel{{ $asignacion->id }}">Eliminar Registro</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>¿Está seguro de que desea eliminar este registro?</p>
                    <div class="form-group mb-3">
                        <label>Municipio</label>
                        <input type="text" class="form-control" value="{{ $asignacion->municipio }}" disabled>
                    </div>
                    <div class="form-group mb-3">
                        <label>Orientador</label>
                        <input type="text" class="form-control"
                            value="{{ $asignacion->user->nombres }} {{ $asignacion->user->apellidos }}" disabled>
                    </div>
                    <div class="form-group mb-3">
                        <label>Periodo</label>
                        <input type="text" class="form-control" value="{{ $asignacion->periodo }}" disabled>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </div>
            </form>
        </div>
    </div>
</div>
