<div class="modal fade" id="concertacionesModal" tabindex="-1" aria-labelledby="concertacionesModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="concertacionesModalLabel">Mis Concertaciones</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @php
                    $cursosConcertar = $consulta->where('Estado_Curso', 'Concertado por validar');
                @endphp

                @if ($cursosConcertar->count() > 0)
                    <form action="{{ route('concertaciones.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="Mes_Poa">Mes de la concertación</label>
                            <select name="Mes_Poa" id="Mes_Poa" class="form-control" required>
                                <option value="">Seleccione un mes...</option>
                                @foreach (['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'] as $mes)
                                    <option value="{{ $mes }}">{{ $mes }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="Vigencia">Vigencia</label>
                            <input type="number" required class="form-control" id="Vigencia" name="Vigencia"
                                value="{{ date('Y') }}" min="2000" max="2100">
                        </div>

                        <div class="form-group">
                            <label>Cursos para concertar</label>
                            <div class="curso-checks">
                                @foreach ($cursosConcertar as $curso)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="cursos[]"
                                            value="{{ $curso->id_Gestion_Cursos }}"
                                            id="curso{{ $curso->id_Gestion_Cursos }}">
                                        <label class="form-check-label" for="curso{{ $curso->id_Gestion_Cursos }}">
                                            {{ $curso->Nombre_Curso }} - {{ $curso->Mes_Poa }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Acta de concertación</label>
                            <input type="file" class="form-control-file" name="acta_concertacion"
                                accept=".doc,.docx,.pdf" required>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Registrar</button>
                        </div>
                    </form>
                @else
                    <div class="alert alert-info">
                        No hay cursos disponibles para concertar.
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
