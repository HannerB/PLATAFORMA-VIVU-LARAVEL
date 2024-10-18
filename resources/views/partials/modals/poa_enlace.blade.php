<div class="modal fade" id="staticBackdropenlace" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Link para compartir con enlace Municipio</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="enlaceCompartir">Compartir Enlace</label>
                    <input readonly type="text" class="form-control" id="enlaceCompartir" name="enlaceCompartir">
                </div>
                <div class="mt-3">
                    <canvas id="qrCode"></canvas>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" id="downloadQR" class="btn btn-primary">Descargar Código QR</button>
                </div>
            </div>
        </div>
    </div>
</div>
