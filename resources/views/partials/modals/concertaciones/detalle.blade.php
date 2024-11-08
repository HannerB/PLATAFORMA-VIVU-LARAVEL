{{-- resources/views/partials/modals/concertaciones/detalle.blade.php --}}
<style>
    .modal-backdrop {
        background-color: rgba(0, 0, 0, 0.5) !important;
    }
</style>

<div class="modal fade" id="modalConcertacion{{ $id }}" tabindex="-1" role="dialog"
    aria-labelledby="modalLabel{{ $id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document"> {{-- Agregué modal-lg para hacerlo más ancho --}}
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel{{ $id }}">Acta de concertación</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if ($estado == 'Acta No valida' || $estado == 'Acta valida')
                    <div class="form-group">
                        <label for="mensaje">Mensaje</label>
                        <textarea class="form-control" id="mensaje" readonly>No se puede modificar esta acta, ya fue revisada y su estado es "{{ $estado }}"</textarea>
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Municipio</th>
                                    <th>Centro</th>
                                    <th>Nombre Curso</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cursosPorConcertacion[$id] as $curso)
                                    <tr>
                                        <td>{{ $curso->Municipio_Curso }}</td>
                                        <td>{{ $curso->Centro_Formacion }}</td>
                                        <td>{{ $curso->Nombre_Curso }}</td>
                                        <td>{{ $curso->Estado_Curso }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
