<div class="modal fade" id="staticBackdropDelete" tabindex="-1" role="dialog" aria-labelledby="staticBackdropDeleteLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropDeleteLabel">Eliminar POA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('poa.destroy', ':id') }}" id="deleteForm">
                    @csrf
                    @method('DELETE')
                    <div class="form-group">
                        <label for="del_gfgnombres">Nombre del Poa</label>
                        <input readonly type="text" class="form-control" id="del_gfgnombres">
                    </div>

                    <div class="form-group">
                        <label for="del_gfgPersona_Enlace">Persona enlace Poa</label>
                        <input readonly type="text" class="form-control" id="del_gfgPersona_Enlace">
                    </div>

                    <div class="form-group">
                        <label for="del_gfgmunicipio">Municipio</label>
                        <input readonly type="text" class="form-control" id="del_gfgmunicipio">
                    </div>

                    <div class="alert alert-danger mt-3">
                        <p class="mb-0">¿Está seguro que desea eliminar este POA?</p>
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
