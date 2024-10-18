<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Actualizar Registro</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formActualizarPoa" method="POST" action="{{ route('poa.update') }}">
                    @csrf
                    <div class="form-group">
                        <label for="gfgnombres">Nombre del Poa</label>
                        <input type="text" required class="form-control" id="gfgnombres" name="gfgnombres"
                            placeholder="Nombre persona enlace">
                    </div>
                    <div class="form-group">
                        <label for="gfgPersona_Enlace">Persona enlace Poa</label>
                        <input type="text" required class="form-control" id="gfgPersona_Enlace"
                            name="gfgPersona_Enlace">
                    </div>
                    <div class="form-group">
                        <label for="gfgTelefono_Enlace">Teléfono del enlace Poa</label>
                        <input type="number" required class="form-control" id="gfgTelefono_Enlace"
                            name="gfgTelefono_Enlace">
                    </div>
                    <div class="form-group">
                        <label for="gfgmunicipio">Municipio del POA</label>
                        <input readonly type="text" class="form-control" id="gfgmunicipio" name="gfgmunicipio">
                    </div>
                    <div class="form-group">
                        <label for="gfgOcupacion_Productiva">Vocación Productiva</label>
                        <input type="text" required class="form-control" id="gfgOcupacion_Productiva"
                            name="gfgOcupacion_Productiva">
                    </div>
                    <div class="form-group">
                        <label for="gfgPoblacion">Población del POA</label>
                        <input readonly type="text" class="form-control" id="gfgPoblacion" name="gfgPoblacion">
                    </div>
                    <input type="hidden" id="poa_id" name="poa_id">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
