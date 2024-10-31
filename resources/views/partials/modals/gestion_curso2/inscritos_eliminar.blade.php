<div class="modal fade" id="deleteModal{{ $inscrito->id_cursos_detalle }}" tabindex="-1" role="dialog"
    aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Eliminar Inscrito</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>¿Está seguro de eliminar al inscrito?</p>
                <p><strong>Nombre:</strong> {{ $inscrito->user->nombres }} {{ $inscrito->user->apellidos }}</p>
                <p><strong>Documento:</strong> {{ $inscrito->user->documento }}</p>
            </div>
            <div class="modal-footer">
                <form action="{{ route('cursos-detalle.destroy', $inscrito->id_cursos_detalle) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>
