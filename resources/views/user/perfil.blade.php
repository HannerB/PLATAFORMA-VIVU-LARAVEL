@extends('layouts.app')

@section('content')
    <div class="container down">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="container post-user-info text-center rounded">
                        <div class="d-flex justify-content-center">
                            <img class="rounded-circle w-50 circle-border" alt="User Image" width="200px"
                                src="{{ asset('storage/img/' . $user->img) }}" />
                        </div>
                        <div class="pt-1 text-center">
                            {{ $user->nombres }} {{ $user->apellidos }}
                        </div>

                        <!-- BOTONES LATERALES -->
                    </div>
                    <div class="full-width list-group" style="border-radius: 0;">
                        <div class="list-group-item text-center">
                            Último inicio de sesión: {{ $user->fecha_sesion }}
                        </div>
                        <a href="{{ route('perfil') }}" class="list-group-item active"
                            style="background-color: #00AF00 !important; border-color:#00AF00;">
                            <i class="fa fa-user fa-fw" aria-hidden="true"></i> Tú perfil
                        </a>
                    </div><br>
                </div>
                <!-- FORMULARIO -->
                <div class="col-md-8">
                    <h2 class="text-center">Editar datos de usuario</h2>
                    <hr>
                    <form class="simple_form edit_user" id="edit_user" enctype="multipart/form-data"
                        action="{{ route('user.update', $user->id) }}" accept-charset="UTF-8" method="post">
                        @csrf
                        @method('PUT')

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputNombres">Nombres</label>
                                <input class="form-control" autofocus="autofocus" required="" aria-required="true"
                                    type="text" name="nombres" id="user_nombre" value="{{ $user->nombres }}" />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputApellidos">Apellidos</label>
                                <input class="form-control" autofocus="autofocus" required="" aria-required="true"
                                    type="text" name="apellidos" id="user_apellidos" value="{{ $user->apellidos }}" />
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputSexo">Sexo</label>
                                <select class="form-control" autofocus="autofocus" required="" aria-required="true"
                                    type="text" name="sexo" id="user_Sexo">
                                    <option selected="true" value="{{ $user->sexo }}">{{ $user->sexo }}</option>
                                    <option value="Femenino">Femenino</option>
                                    <option value="Masculino">Masculino</option>
                                    <option value="Prefiero no decirlo">Prefiero no decirlo</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputFechaNacimiento">Fecha de nacimiento</label>
                                <input class="form-control" required="" type="date" name="fechaNacimiento"
                                    id="" value="{{ $user->fechaNacimiento }}" />
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="inputDireccion">Dirección de correo electrónico</label>
                                <input class="form-control" required="required" type="email" value="{{ $user->email }}"
                                    name="email" id="user_email" />
                                <p class="help-block">Se le enviará un correo de confirmación</p>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputTipoDocumento">Tipo documento</label>
                                <select class="form-control form-control-sm" name="tipodocumento"
                                    id="user_tipo_documento_id">
                                    <option value="{{ $user->tipodocumento }}" selected="selected">
                                        {{ $user->tipodocumento }}</option>
                                    <option value="Cedula de Ciudadanía">Cedula de Ciudadanía</option>
                                    <option value="Cedula de Extranjeria">Cedula de Extranjeria</option>
                                    <option value="Tarjeta de Identidad">Tarjeta de Identidad</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputDocumento">Documento</label>
                                <input class="form-control" min="1" autofocus="autofocus" required="required"
                                    aria-required="true" type="number" step="1" value="{{ $user->documento }}"
                                    name="documento" id="user_documento" />
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputTelefono">Telefono</label>
                                <input class="form-control" autofocus="autofocus" required="required"
                                    aria-required="true" type="text" value="{{ $user->telefono }}" name="telefono"
                                    id="user_telefono" />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputMunicipio">Municipio</label>
                                <input class="form-control" autocomplete="Municipio" autofocus="autofocus"
                                    required="" aria-required="true" type="text" value="{{ $user->municipio }}"
                                    name="municipio" id="user_Municipio" />
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label class="control-label" for="user_tipo_de_poblacion_id">Tipo de poblacion</label>
                                <select class="form-control select" name="tipoPoblacion" id="user_tipo_de_poblacion_id">
                                    <option value="{{ $user->tipoPoblacion }}" selected="true">
                                        {{ $user->tipoPoblacion }}</option>
                                    <option value="Desplazados por la violencia">Desplazados por la violencia</option>
                                    <option value="Víctimas del conflicto armado">Víctimas del conflicto armado</option>
                                    <option value="Discapacitados">Discapacitados</option>
                                    <option value="Indígenas">Indígenas</option>
                                    <option value="Convenio INPEC">Convenio INPEC</option>
                                    <option value="Jóvenes vulnerables">Jóvenes vulnerables</option>
                                    <option value="Adolescentes en conflicto con la ley penal">Adolescentes en conflicto
                                        con la ley penal</option>
                                    <option value="Mujeres cabeza de hogar">Mujeres cabeza de hogar</option>
                                    <option value="Negritudes">Negritudes</option>
                                    <option value="Afrocolombianos">Afrocolombianos </option>
                                    <option value="Palenques">Palenques</option>
                                    <option value="Raizales">Raizales</option>
                                    <option value="ROM">ROM</option>
                                    <option
                                        value="Desplazados por fenómenos naturales y desplazados por fenómenos naturales cabeza de hogar">
                                        Desplazados por fenómenos naturales y desplazados por fenómenos naturales cabeza de
                                        hogar</option>
                                    <option
                                        value="Proceso de reintegración y adolescentes desvinculados de Grupo armados organizados al margen de la ley">
                                        Proceso de reintegración y adolescentes desvinculados de Grupo armados organizados
                                        al margen de la ley</option>
                                    <option value="Tercera edad">Tercera edad</option>
                                    <option value="Adolescente trabajador">Adolescente trabajador</option>
                                    <option value="Remitidos por el PAL">Remitidos por el PAL</option>
                                    <option value="Soldados campesinos">Soldados campesinos</option>
                                    <option value="Sobrevivientes minas antipersonas">Sobrevivientes minas antipersonas
                                    </option>
                                    <option value="Comunidad LGBTI">Comunidad LGBTI</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputContrasena">Contraseña nueva</label>
                                <input class="form-control" autocomplete="new-password" type="password" name="password"
                                    id="user_password" />
                                <p class="help-block">Deje los campos de contraseñas vacios si no desea actualizarla.</p>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputContrasena">Repita la contraseña</label>
                                <input class="form-control" autocomplete="new-password" type="password"
                                    name="password_confirmation" id="user_password_confirmation" />
                                <p class="help-block">Deje los campos de contraseñas vacios si no desea actualizarla.</p>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputContrasena">Contraseña actual</label>
                                <input class="form-control" autocomplete="current-password" aria-required="true"
                                    type="password" name="current_password" id="user_current_password" />
                                <p class="help-block">Si cambió la clave, se necesita su contraseña actual para confirmar.
                                </p>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="inputContrasena">Nueva Foto de Perfil</label>
                                <input class="file optional" type="file" name="img" id="user_perfil" />
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <input type="submit" name="commit" value="Actualizar datos"
                                    class="btn btn-outline-primary btn-block" data-disable-with="Actualizar datos" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
