@auth
    <div class="modal fade" id="inscriptionModal" tabindex="-1" aria-labelledby="inscriptionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="inscriptionModalLabel">
                        <i class="fa fa-user-plus"></i> Inscripción al curso
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Información del curso seleccionado -->
                    <div class="curso-info mb-3">
                        <h6>Detalles del curso:</h6>
                        <p class="mb-1"><strong>Programa:</strong> <span id="curso-nombre"></span></p>
                        <p class="mb-1"><strong>Municipio:</strong> <span id="curso-municipio"></span></p>
                        <p class="mb-1"><strong>Fecha inicio:</strong> <span id="curso-fecha"></span></p>
                    </div>

                    <form id="inscriptionForm" action="{{ route('inscribir.curso') }}" method="POST">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cedula" class="form-label">
                                        <i class="fa fa-id-card"></i> Nro de documento
                                    </label>
                                    <input type="number" class="form-control @error('cedula') is-invalid @enderror"
                                        id="cedula" name="cedula" value="{{ Auth::user()->documento ?? '' }}"
                                        placeholder="Nro documento" required>
                                    @error('cedula')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="anio" class="form-label">
                                        <i class="fa fa-calendar"></i> Año de nacimiento
                                    </label>
                                    <input type="number" class="form-control @error('anio') is-invalid @enderror"
                                        id="anio" name="anio" min="1900" max="{{ date('Y') }}"
                                        placeholder="Año de nacimiento" required>
                                    @error('anio')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <input type="hidden" id="curso_id" name="curso_id" value="">
                        </div>
                    </form>
                    <div id="resultado" class="mt-3"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fa fa-times"></i> Cerrar
                    </button>
                    <button type="submit" form="inscriptionForm" class="btn btn-primary" id="btnInscribir">
                        <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                        <i class="fa fa-check"></i> Inscribir
                    </button>
                </div>
            </div>
        </div>
    </div>

    <style>
        .modal-header {
            background-color: #f8f9fa;
            border-bottom: 2px solid #dee2e6;
        }

        .curso-info {
            background-color: #f8f9fa;
            padding: 1rem;
            border-radius: 0.25rem;
        }

        .invalid-feedback {
            display: block;
        }

        .spinner-border {
            margin-right: 0.5rem;
        }
    </style>

    @push('scripts')
        <script>
            $(document).ready(function() {
                // Manejo del botón inscribir
                $('.inscribir-btn').click(function() {
                    var curso = $(this).closest('tr');
                    var cursoId = $(this).data('curso-id');

                    // Llenar información del curso
                    $('#curso-nombre').text(curso.find('td:eq(2)').text());
                    $('#curso-municipio').text(curso.find('td:eq(0)').text());
                    $('#curso-fecha').text(curso.find('td:eq(5)').text());

                    // Establecer ID del curso
                    $('#curso_id').val(cursoId);

                    // Pre-llenar documento del usuario si está disponible
                    if ('{{ Auth::check() }}') {
                        $('#cedula').val('{{ Auth::user()->documento }}');
                    }
                });

                // Manejo del formulario
                $('#inscriptionForm').on('submit', function(e) {
                    e.preventDefault();

                    // Deshabilitar botón y mostrar spinner
                    $('#btnInscribir').prop('disabled', true)
                        .find('.spinner-border').removeClass('d-none');

                    $.ajax({
                        url: $(this).attr('action'),
                        method: 'POST',
                        data: $(this).serialize(),
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            $('#resultado').html(`
                    <div class="alert alert-success">
                        <i class="fa fa-check-circle"></i> ${response.message}
                    </div>
                `);
                            setTimeout(() => {
                                $('#inscriptionModal').modal('hide');
                                location.reload();
                            }, 2000);
                        },
                        error: function(xhr) {
                            $('#resultado').html(`
                    <div class="alert alert-danger">
                        <i class="fa fa-exclamation-circle"></i> ${xhr.responseJSON.message}
                    </div>
                `);
                        },
                        complete: function() {
                            // Restaurar botón
                            $('#btnInscribir').prop('disabled', false)
                                .find('.spinner-border').addClass('d-none');
                        }
                    });
                });
            });
        </script>
    @endpush
@else
    <script>
        window.location = "{{ route('login') }}";
    </script>
@endauth
