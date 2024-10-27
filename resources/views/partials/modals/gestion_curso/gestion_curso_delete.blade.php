<div class="modal fade" id="deleteModal{{ $curso->id_Gestion_Cursos }}" tabindex="-1" role="dialog"
    aria-labelledby="deleteModalLabel{{ $curso->id_Gestion_Cursos }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="deleteModalLabel{{ $curso->id_Gestion_Cursos }}">Confirmar eliminación</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>¿Está seguro que desea eliminar el curso "{{ $curso->Nombre_Curso }}"?</p>
                <p class="text-muted small">Esta acción no se puede deshacer.</p>
            </div>
            <div class="modal-footer">
                <form action="{{ route('gestion-curso.destroy', ['gestion_curso' => $curso->id_Gestion_Cursos]) }}"
                    method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>
