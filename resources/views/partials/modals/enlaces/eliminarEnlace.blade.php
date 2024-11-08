<div class="modal fade" id="deleteModal-{{ $alianza->id_alianza }}" tabindex="-1" role="dialog"
    aria-labelledby="deleteModalLabel-{{ $alianza->id_alianza }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel-{{ $alianza->id_alianza }}">Confirmar Eliminación</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('alianza-municipio.destroy', $alianza->id_alianza) }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <p>¿Está seguro que desea eliminar este enlace?</p>
                    <div class="alert alert-warning">
                        <strong>Detalles del enlace:</strong><br>
                        <strong>Municipio:</strong> {{ $alianza->municipio }}<br>
                        <strong>Enlace:</strong> {{ $alianza->nombres }} {{ $alianza->apellidos }}<br>
                        <strong>Periodo:</strong> {{ $alianza->periodo }}<br>
                        <strong>Estado:</strong> {{ $alianza->estado }}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </div>
            </form>
        </div>
    </div>
</div>
