<div class="modal fade" id="staticBackdropDelete" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">
                    <i class="fa fa-trash mr-2"></i>Confirmar Eliminación
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center p-4">
                <i class="fa fa-exclamation-triangle fa-3x text-warning mb-3"></i>
                <h4 class="mb-3">¿Está seguro de eliminar este curso?</h4>
                <p class="text-muted">Esta acción no se puede deshacer.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    <i class="fa fa-times mr-2"></i>Cancelar
                </button>
                <form id="deleteForm" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="fa fa-trash mr-2"></i>Eliminar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
