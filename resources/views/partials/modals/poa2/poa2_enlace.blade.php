<!-- Modal de Enlace -->
<div class="modal fade" id="staticBackdropenlace" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Link para compartir con enlace Municipio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="enlaceCompartir">Compartir Enlace</label>
                    <input readonly type="text" class="form-control" id="enlaceCompartir" name="enlaceCompartir">
                </div>
                <div id="qrCode"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" id="downloadQR" class="btn btn-primary">Descargar Código QR</button>
            </div>
        </div>
    </div>
</div>
