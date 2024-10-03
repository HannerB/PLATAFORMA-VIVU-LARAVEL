@extends('layouts.app')

@section('title', 'Registrarme | Oferta Complementaria')

@section('content')
    <div class="mt-1 PopUpContainer">
        <div class="contentContainer">
            <ol class="breadcrumb">
                <li><a href="{{ route('home') }}">Inicio</a></li>
                <li class="active">Registrarme</li>
            </ol>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                <div class="container-login">
                    <i class="fa fa-user container-login-icon" aria-hidden="true"></i>
                    <h3 class="text-center">Registrarme</h3>
                </div>
                <form class="simple_form" id="frmGuardarAprendiz" action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="control-label" for="user_nombre">Nombres</label>
                            <input class="form-control" required type="text" name="txtNombres" id="txtNombres"
                                value="{{ old('txtNombres') }}" />
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputApellidos">Apellidos</label>
                            <input class="form-control" required type="text" name="txtApellidos" id="txtApellidos"
                                value="{{ old('txtApellidos') }}" />
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputSexo">Sexo</label>
                            <select class="form-control form-control-sm" required aria-required="true" name="txtSexo"
                                id="txtSexo">
                                <option value="" disabled selected>Seleccione...</option>
                                <option value="Femenino" {{ old('txtSexo') == 'Femenino' ? 'selected' : '' }}>Femenino
                                </option>
                                <option value="Masculino" {{ old('txtSexo') == 'Masculino' ? 'selected' : '' }}>Masculino
                                </option>
                                <option value="Prefiero no decirlo"
                                    {{ old('txtSexo') == 'Prefiero no decirlo' ? 'selected' : '' }}>Prefiero no decirlo
                                </option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputFechaNacimiento">Fecha de nacimiento</label>
                            <input class="form-control" required type="date" name="txtFechaNacimiento"
                                id="txtFechaNacimiento" value="{{ old('txtFechaNacimiento') }}" />
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputDireccion">Dirección de correo electrónico</label>
                            <input class="form-control" required type="email" name="txtCorreo" id="txtCorreo"
                                value="{{ old('txtCorreo') }}" />
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputContrasena">Contraseña actual</label>
                            <input class="form-control" required aria-required="true" type="password" name="txtPassword"
                                id="txtPassword" />
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputTipoDocumento">Tipo documento</label>
                            <select required class="form-control form-control-sm" name="txtTipoDocumento"
                                id="txtTipoDocumento">
                                <option value="" disabled selected>Seleccione...</option>
                                <option value="Cedula de Ciudadanía"
                                    {{ old('txtTipoDocumento') == 'Cedula de Ciudadanía' ? 'selected' : '' }}>Cédula de
                                    Ciudadanía</option>
                                <option value="Cedula de Extranjeria"
                                    {{ old('txtTipoDocumento') == 'Cedula de Extranjeria' ? 'selected' : '' }}>Cédula de
                                    Extranjeria</option>
                                <option value="Tarjeta de Identidad"
                                    {{ old('txtTipoDocumento') == 'Tarjeta de Identidad' ? 'selected' : '' }}>Tarjeta de
                                    Identidad</option>
                                <option value="Pep" {{ old('txtTipoDocumento') == 'Pep' ? 'selected' : '' }}>Pep
                                </option>
                                <option value="Ppt" {{ old('txtTipoDocumento') == 'Ppt' ? 'selected' : '' }}>Ppt
                                </option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputDocumento">Documento</label>
                            <input class="form-control" min="1" required="required" type="number" step="1"
                                name="txtDocumento" id="txtDocumento" value="{{ old('txtDocumento') }}" />
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputTelefono">Teléfono</label>
                            <input class="form-control" required="required" type="number" name="txtTelefono"
                                id="txtTelefono" value="{{ old('txtTelefono') }}" />
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputMunicipio">Municipio</label>
                            <input class="form-control" required type="text" name="txtMunicipio" id="txtMunicipio"
                                value="{{ old('txtMunicipio') }}" />
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label class="control-label" for="user_tipo_de_poblacion_id">Tipo de poblacion</label>
                            <select class="form-control select" name="txtTipoPoblacion" id="txtTipoPoblacion" required>
                                <option value="" disabled selected>Seleccione...</option>
                                <option value="Ninguno" {{ old('txtTipoPoblacion') == 'Ninguno' ? 'selected' : '' }}>
                                    Ninguno</option>
                                <option value="Desplazados por la violencia"
                                    {{ old('txtTipoPoblacion') == 'Desplazados por la violencia' ? 'selected' : '' }}>
                                    Desplazados por la violencia</option>
                                <option value="Víctimas del conflicto armado"
                                    {{ old('txtTipoPoblacion') == 'Víctimas del conflicto armado' ? 'selected' : '' }}>
                                    Víctimas del conflicto armado</option>
                                <option value="Discapacitados"
                                    {{ old('txtTipoPoblacion') == 'Discapacitados' ? 'selected' : '' }}>
                                    Discapacitados</option>
                                <option value="Indígenas" {{ old('txtTipoPoblacion') == 'Indígenas' ? 'selected' : '' }}>
                                    Indígenas</option>
                                <option value="Convenio INPEC"
                                    {{ old('txtTipoPoblacion') == 'Convenio INPEC' ? 'selected' : '' }}>
                                    Convenio INPEC</option>
                                <option value="Jóvenes vulnerables"
                                    {{ old('txtTipoPoblacion') == 'Jóvenes vulnerables' ? 'selected' : '' }}>
                                    Jóvenes vulnerables</option>
                                <option value="Adolescentes en conflicto con la ley penal"
                                    {{ old('txtTipoPoblacion') == 'Adolescentes en conflicto con la ley penal' ? 'selected' : '' }}>
                                    Adolescentes en conflicto con la ley penal</option>
                                <option value="Mujeres cabeza de hogar"
                                    {{ old('txtTipoPoblacion') == 'Mujeres cabeza de hogar' ? 'selected' : '' }}>
                                    Mujeres cabeza de hogar</option>
                                <option value="Negritudes"
                                    {{ old('txtTipoPoblacion') == 'Negritudes' ? 'selected' : '' }}>
                                    Negritudes</option>
                                <option value="Afrocolombianos"
                                    {{ old('txtTipoPoblacion') == 'Afrocolombianos' ? 'selected' : '' }}>
                                    Afrocolombianos</option>
                                <option value="Colombianos Retornados"
                                    {{ old('txtTipoPoblacion') == 'Colombianos Retornados' ? 'selected' : '' }}>
                                    Colombianos Retornados</option>
                                <option value="Palenques" {{ old('txtTipoPoblacion') == 'Palenques' ? 'selected' : '' }}>
                                    Palenques</option>
                                <option value="Raizales" {{ old('txtTipoPoblacion') == 'Raizales' ? 'selected' : '' }}>
                                    Raizales</option>
                                <option value="ROM" {{ old('txtTipoPoblacion') == 'ROM' ? 'selected' : '' }}>
                                    ROM</option>
                                <option value="Migrantes" {{ old('txtTipoPoblacion') == 'Migrantes' ? 'selected' : '' }}>
                                    Migrantes</option>
                                <option
                                    value="Desplazados por fenómenos naturales y desplazados por fenómenos naturales cabeza de hogar"
                                    {{ old('txtTipoPoblacion') == 'Desplazados por fenómenos naturales y desplazados por fenómenos naturales cabeza de hogar' ? 'selected' : '' }}>
                                    Desplazados por fenómenos naturales y desplazados por fenómenos naturales cabeza de
                                    hogar</option>
                                <option
                                    value="Proceso de reintegración y adolescentes desvinculados de Grupo armados organizados al margen de la ley"
                                    {{ old('txtTipoPoblacion') == 'Proceso de reintegración y adolescentes desvinculados de Grupo armados organizados al margen de la ley' ? 'selected' : '' }}>
                                    Proceso de reintegración y adolescentes desvinculados de Grupo armados organizados al
                                    margen de la ley</option>
                                <option value="Tercera edad"
                                    {{ old('txtTipoPoblacion') == 'Tercera edad' ? 'selected' : '' }}>
                                    Tercera edad</option>
                                <option value="Adolescente trabajador"
                                    {{ old('txtTipoPoblacion') == 'Adolescente trabajador' ? 'selected' : '' }}>
                                    Adolescente trabajador</option>
                                <option value="Remitidos por el PAL"
                                    {{ old('txtTipoPoblacion') == 'Remitidos por el PAL' ? 'selected' : '' }}>
                                    Remitidos por el PAL</option>
                                <option value="Sobrevivientes minas antipersonas"
                                    {{ old('txtTipoPoblacion') == 'Sobrevivientes minas antipersonas' ? 'selected' : '' }}>
                                    Sobrevivientes minas antipersonas</option>
                                <option value="Comunidad LGBTI"
                                    {{ old('txtTipoPoblacion') == 'Comunidad LGBTI' ? 'selected' : '' }}>
                                    Comunidad LGBTI</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row mt-2">
                        <div class="form-group col-md-12">
                            <button type="submit" id=""
                                class="btn btn-outline-success btn-block">Registrar</button>
                            <a href="{{ route('login') }}" class="btn btn-outline-success btn-block mt-1">Iniciar
                                sesión</a>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $('#frmGuardarAprendiz').submit(function(e) {
                e.preventDefault();

                $.ajax({
                    url: $(this).attr('action'),
                    method: $(this).attr('method'),
                    data: $(this).serialize(),
                    success: function(response) {
                        if (response.success) {
                            Swal.fire('Correcto!', 'Se ha guardado correctamente!', 'success');
                            $('#frmGuardarAprendiz')[0].reset();
                        } else {
                            Swal.fire('Error!', response.message, 'error');
                        }
                    },
                    error: function(xhr) {
                        var errors = xhr.responseJSON.errors;
                        var errorMessage = '';
                        $.each(errors, function(key, value) {
                            errorMessage += value[0] + '<br>';
                        });
                        Swal.fire('Error!', errorMessage, 'error');
                    }
                });
            });
        });
    </script>
@endpush
