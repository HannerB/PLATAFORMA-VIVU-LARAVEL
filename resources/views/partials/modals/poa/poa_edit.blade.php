<div class="modal fade" id="staticBackdrop" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Actualizar Registro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('poa.update') }}" id="editForm">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <label for="gfgnombres">Nombre del Poa</label>
                        <input type="text" required class="form-control" id="gfgnombres" name="gfgnombres">
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

                    <input type="hidden" name="poa_id" id="poa_id">

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        // Editar POA
        $('.gfgselect').click(function() {
            // Obtener la fila actual
            var tr = $(this).closest('tr');

            // Capturar los datos de la fila
            var nombres = tr.find('.gfgnombres').text().trim();
            var persona = tr.find('.gfgPersona_Enlace').text().trim();
            var telefono = tr.find('.gfgTelefono_Enlace').text().trim();
            var municipio = tr.find('.gfgmunicipio').text().trim();
            var ocupacion = tr.find('.gfgOcupacion_Productiva').text().trim();
            var poblacion = tr.find('.gfgPoblacion').text().trim();
            var id = tr.find('.gfgid').text().trim();

            // Asignar los valores a los campos del modal de edición
            $('#gfgnombres').val(nombres);
            $('#gfgPersona_Enlace').val(persona);
            $('#gfgTelefono_Enlace').val(telefono);
            $('#gfgmunicipio').val(municipio);
            $('#gfgOcupacion_Productiva').val(ocupacion);
            $('#gfgPoblacion').val(poblacion);
            $('#poa_id').val(id);
        });

        // Borrar POA
        $('.gfgdelete').click(function() {
            // Obtener la fila actual
            var tr = $(this).closest('tr');

            // Capturar los datos de la fila
            var nombres = tr.find('.gfgnombres').text().trim();
            var persona = tr.find('.gfgPersona_Enlace').text().trim();
            var municipio = tr.find('.gfgmunicipio').text().trim();
            var id = tr.find('.gfgid').text().trim();

            // Asignar los valores a los campos del modal de eliminación
            $('#del_gfgnombres').val(nombres);
            $('#del_gfgPersona_Enlace').val(persona);
            $('#del_gfgmunicipio').val(municipio);

            // Actualizar la URL del formulario de eliminación
            var url = '{{ route('poa.destroy', ':id') }}';
            url = url.replace(':id', id);
            $('#deleteForm').attr('action', url);
        });

        // Funciones de búsqueda y filtrado
        var busqueda = document.getElementById('buscar');
        var table = document.getElementById("tabla").tBodies[0];

        buscaTabla = function() {
            texto = busqueda.value.toLowerCase();
            var r = 0;
            while (row = table.rows[r++]) {
                if (row.innerText.toLowerCase().indexOf(texto) !== -1)
                    row.style.display = null;
                else
                    row.style.display = 'none';
            }
        }

        busqueda.addEventListener('keyup', buscaTabla);

        // Función para ocultar/mostrar el formulario
        function ocultar() {
            $("#ocultar").toggle();
        }
    });

    // Para evitar problemas con los modales, podemos agregar esto:
    $(document).on('hidden.bs.modal', '.modal', function() {
        $('.modal:visible').length && $(document.body).addClass('modal-open');
    });
</script>
