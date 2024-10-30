<div class="modal fade" id="staticBackdropconcertaciones" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-info text-white">
                <h5 class="modal-title">
                    <i class="fa fa-handshake-o mr-2"></i>Mis Concertaciones
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Fecha</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($curso->concertaciones as $concertacion)
                            <tr>
                                <td>{{ $concertacion->id_concertacion }}</td>
                                <td>{{ $concertacion->fecha_registro }}</td>
                                <td>{{ $concertacion->estado ?? 'Pendiente' }}</td>
                                <td>
                                    <button class="btn btn-sm btn-info">Ver detalles</button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">No hay concertaciones disponibles</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
