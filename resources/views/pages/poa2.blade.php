@extends('layouts.app')

@section('content')
    <div class="container contenedor">
        @if (session('status'))
            <div class="alert alert-success alert-dismissible" style="margin-top:20px;">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <span class="icon-checkmark"></span> {{ session('status') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible" style="margin-top:20px;">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <span class="icon-checkmark"></span> Operacion NO Realizada: {{ session('error') }}
            </div>
        @endif

        <br>

        <div class="table-responsive">
            <table id="tabla" class="table table-striped">
                <thead>
                    <tr>
                        <th style="width:80px">Nombre Poa</th>
                        <th style="width:80px">Municipio</th>
                        <th style="width:50px">Vigencia</th>
                        <th style="width:100px">Enlace</th>
                        <th style="width:50px">Telefono</th>
                        <th style="width:80px">Tipo Poblacion</th>
                        <th style="width:80px">Vocacion Productiva</th>
                        <th style="width:30px">Cursos</th>
                        <th style="width:280px">Gestion del Poa</th>
                    </tr>
                    <tr>
                        <td colspan="9">
                            <input id="buscar" type="text" class="form-control" placeholder="filtrar" />
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($poas as $poa)
                        <tr>
                            <td class="gfgnombres">{{ $poa->Nombre_Poa }}</td>
                            <td class="gfgmunicipio">{{ $poa->municipio }}</td>
                            <td class="gfgperiodo">{{ $poa->periodo }}</td>
                            <td class="gfgPersona_Enlace">{{ $poa->Persona_Enlace }}</td>
                            <td class="gfgTelefono_Enlace">{{ $poa->Telefono_Enlace }}</td>
                            <td class="gfgPoblacion">{{ $poa->Poblacion }}</td>
                            <td class="gfgOcupacion_Productiva">{{ $poa->Ocupacion_Productiva }}</td>
                            <td class="gfgcursos">{{ $poa->gestionCursos->count() }}</td>
                            <td class="gfgid" style="display:none">{{ $poa->id_poa }}</td>
                            <td>
                                @if (auth()->user()->alianza != 0)
                                    <button class="gfgselect btn btn-primary btn-xs" data-bs-toggle="modal"
                                        data-bs-target="#staticBackdrop">Editar</button>
                                    <button class="gfgdelete btn btn-danger btn-xs" data-bs-toggle="modal"
                                        data-bs-target="#staticBackdropDelete">Borrar</button>
                                @endif
                                <a href="{{ route('poa.Gestion_cursos2', $poa->id_poa) }}"
                                    class="btn btn-warning btn-xs">Ver Cursos</a>
                                <button class="gfgenlace btn btn-success btn-xs" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdropenlace">Enlace</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @include('partials.modals.poa_edit')
    @include('partials.modals.poa_delete')
    @include('partials.modals.poa_enlace')
@endsection

@push('scripts')
    <script src="https://unpkg.com/qrious@4.0.2/dist/qrious.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js"></script>
    <script>
        @push('scripts')
            <
            script src = "https://unpkg.com/qrious@4.0.2/dist/qrious.js" >
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js"></script>
    <script>
        $(document).ready(function() {
            var busqueda = document.getElementById('buscar');
            var table = document.getElementById("tabla").tBodies[0];

            function buscaTabla() {
                var texto = busqueda.value.toLowerCase();
                var r = 0;
                while (row = table.rows[r++]) {
                    if (row.innerText.toLowerCase().indexOf(texto) !== -1)
                        row.style.display = null;
                    else
                        row.style.display = 'none';
                }
            }

            busqueda.addEventListener('keyup', buscaTabla);

            $(".gfgselect").click(function() {
                var row = $(this).closest("tr");
                var data = {
                    id: row.find(".gfgid").text(),
                    nombres: row.find(".gfgnombres").text(),
                    persona_enlace: row.find(".gfgPersona_Enlace").text(),
                    telefono_enlace: row.find(".gfgTelefono_Enlace").text(),
                    ocupacion_productiva: row.find(".gfgOcupacion_Productiva").text(),
                    municipio: row.find(".gfgmunicipio").text(),
                    poblacion: row.find(".gfgPoblacion").text()
                };

                $("#gfgnombres").val(data.nombres);
                $("#gfgPersona_Enlace").val(data.persona_enlace);
                $("#gfgTelefono_Enlace").val(data.telefono_enlace);
                $("#gfgmunicipio").val(data.municipio);
                $("#gfgOcupacion_Productiva").val(data.ocupacion_productiva);
                $("#gfgPoblacion").val(data.poblacion);
                $("#poa_id").val(data.id);
            });

            $("#formActualizarPoa").submit(function(e) {
                e.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    url: "{{ route('poa.update') }}",
                    type: "POST",
                    data: formData,
                    success: function(response) {
                        if (response.success) {
                            alert('POA actualizado con éxito');
                            location.reload();
                        } else {
                            alert('Error al actualizar POA');
                        }
                    }
                });
            });

            $(".gfgenlace").click(function() {
                var id = $(this).closest("tr").find(".gfgid").text();
                var enlace = "https://www.vivu.com.co/vivuWeb/cursosReg.php?poa=" + id;
                $("#enlaceCompartir").val(enlace);

                new QRious({
                    element: document.getElementById('qrCode'),
                    value: enlace
                });
            });

            $("#downloadQR").click(function() {
                var canvas = document.getElementById('qrCode');
                var image = canvas.toDataURL("image/png").replace("image/png", "image/octet-stream");
                var link = document.createElement('a');
                link.download = "QR_POA.png";
                link.href = image;
                link.click();
            });

            $(".gfgdelete").click(function() {
                var row = $(this).closest("tr");
                var cursos = row.find(".gfgcursos").text();
                var id = row.find(".gfgid").text();

                if (parseInt(cursos) > 0) {
                    $("#mensajeEliminar").text(
                        "No se puede eliminar este POA - tiene formaciones registradas");
                    $("#btnConfirmarEliminar").hide();
                } else {
                    $("#mensajeEliminar").text("¿Está seguro de que desea eliminar este POA?");
                    $("#btnConfirmarEliminar").show();
                    $("#poaIdEliminar").val(id);
                }
            });

            $("#formEliminarPoa").submit(function(e) {
                e.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    url: "{{ route('poa.delete') }}",
                    type: "POST",
                    data: formData,
                    success: function(response) {
                        if (response.success) {
                            alert('POA eliminado con éxito');
                            location.reload();
                        } else {
                            alert('Error al eliminar POA');
                        }
                    }
                });
            });
        });

        function ocultar() {
            $("#ocultar").toggle();
        }

        $(function() {
            $("#ocultar").toggle();
        });
    </script>
@endpush
</script>
@endpush
