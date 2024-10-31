<div class="modal fade" id="deleteModal{{ $inscrito->id_cursos_detalle }}" tabindex="-1" role="dialog"
    aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirmar eliminación</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ¿Está seguro que desea eliminar al inscrito {{ $inscrito->nombres }} {{ $inscrito->apellidos }}?
            </div>
            <div class="modal-footer">
                <form action="{{ route('cursos-detalle.eliminar', $inscrito->id_cursos_detalle) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>
