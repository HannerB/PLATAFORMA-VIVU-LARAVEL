@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Gestión de Usuarios</h4>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <form action="{{ route('admin.buscar-usuario') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Introduzca nro de documento</label>
                                <div class="input-group">
                                    <input type="number" class="form-control @error('cedula') is-invalid @enderror"
                                        name="cedula" value="{{ old('cedula') }}" required>
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-search"></i> Buscar
                                        </button>
                                    </div>
                                </div>
                                @error('cedula')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </form>

                        @if (isset($usuario))
                            <form action="{{ route('admin.actualizar-usuario') }}" method="POST" class="mt-4">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="id" value="{{ $usuario->id }}">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nombres</label>
                                            <input type="text"
                                                class="form-control @error('txtNombres') is-invalid @enderror"
                                                name="txtNombres" value="{{ old('txtNombres', $usuario->nombres) }}"
                                                required>
                                            @error('txtNombres')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Apellidos</label>
                                            <input type="text"
                                                class="form-control @error('txtApellidos') is-invalid @enderror"
                                                name="txtApellidos" value="{{ old('txtApellidos', $usuario->apellidos) }}"
                                                required>
                                            @error('txtApellidos')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Sexo</label>
                                            <select class="form-control @error('txtSexo') is-invalid @enderror"
                                                name="txtSexo" required>
                                                <option value="{{ $usuario->sexo }}" selected>{{ $usuario->sexo }}
                                                </option>
                                                <option value="Femenino">Femenino</option>
                                                <option value="Masculino">Masculino</option>
                                                <option value="Prefiero no decirlo">Prefiero no decirlo</option>
                                            </select>
                                            @error('txtSexo')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Fecha de nacimiento</label>
                                            <input type="date"
                                                class="form-control @error('txtFechaNacimiento') is-invalid @enderror"
                                                name="txtFechaNacimiento" value="{{ $usuario->fechaNacimiento }}" required>
                                            @error('txtFechaNacimiento')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Correo electrónico</label>
                                            <input type="email"
                                                class="form-control @error('txtCorreo') is-invalid @enderror"
                                                name="txtCorreo" value="{{ $usuario->email }}" required>
                                            @error('txtCorreo')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Contraseña</label>
                                            <input type="text"
                                                class="form-control @error('txtPassword') is-invalid @enderror"
                                                name="txtPassword" placeholder="Dejar en blanco para mantener la actual">
                                            @error('txtPassword')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tipo de documento</label>
                                            <select class="form-control @error('txtTipoDocumento') is-invalid @enderror"
                                                name="txtTipoDocumento" required>
                                                <option value="{{ $usuario->tipodocumento }}" selected>
                                                    {{ $usuario->tipodocumento }}</option>
                                                <option value="Cedula de Ciudadanía">Cédula de Ciudadanía</option>
                                                <option value="Cedula de Extranjeria">Cédula de Extranjería</option>
                                                <option value="Tarjeta de Identidad">Tarjeta de Identidad</option>
                                                <option value="Pep">Pep</option>
                                                <option value="Ppt">Ppt</option>
                                            </select>
                                            @error('txtTipoDocumento')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Documento</label>
                                            <input type="number" class="form-control" name="txtDocumento"
                                                value="{{ $usuario->documento }}" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Teléfono</label>
                                            <input type="number"
                                                class="form-control @error('txtTelefono') is-invalid @enderror"
                                                name="txtTelefono" value="{{ $usuario->telefono }}" required>
                                            @error('txtTelefono')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Municipio</label>
                                            <input type="text"
                                                class="form-control @error('txtMunicipio') is-invalid @enderror"
                                                name="txtMunicipio" value="{{ $usuario->municipio }}" required>
                                            @error('txtMunicipio')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tipo de población</label>
                                            <select class="form-control @error('txtTipoPoblacion') is-invalid @enderror"
                                                name="txtTipoPoblacion" required>
                                                <option value="{{ $usuario->tipoPoblacion }}" selected>
                                                    {{ $usuario->tipoPoblacion }}</option>
                                                <option value="Desplazados por la violencia">Desplazados por la violencia
                                                </option>
                                                <option value="Víctimas del conflicto armado">Víctimas del conflicto armado
                                                </option>
                                                <option value="Discapacitados">Discapacitados</option>
                                                <option value="Indígenas">Indígenas</option>
                                                <option value="Convenio INPEC">Convenio INPEC</option>
                                                <option value="Jóvenes vulnerables">Jóvenes vulnerables</option>
                                                <option value="Adolescentes en conflicto con la ley penal">Adolescentes en
                                                    conflicto con la ley penal</option>
                                                <option value="Mujeres cabeza de hogar">Mujeres cabeza de hogar</option>
                                                <option value="Negritudes">Negritudes</option>
                                                <option value="Afrocolombianos">Afrocolombianos</option>
                                                <option value="Palenques">Palenques</option>
                                                <option value="Raizales">Raizales</option>
                                                <option value="ROM">ROM</option>
                                                <option value="Desplazados por fenómenos naturales">Desplazados por
                                                    fenómenos naturales</option>
                                                <option value="Proceso de reintegración">Proceso de reintegración</option>
                                                <option value="Tercera edad">Tercera edad</option>
                                                <option value="Adolescente trabajador">Adolescente trabajador</option>
                                                <option value="Remitidos por el PAL">Remitidos por el PAL</option>
                                                <option value="Soldados campesinos">Soldados campesinos</option>
                                                <option value="Sobrevivientes minas antipersonas">Sobrevivientes minas
                                                    antipersonas</option>
                                                <option value="Comunidad LGBTI">Comunidad LGBTI</option>
                                            </select>
                                            @error('txtTipoPoblacion')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nivel de Acceso</label>
                                            <select class="form-control @error('rol') is-invalid @enderror"
                                                name="rol" required>
                                                <option value="{{ $usuario->rol }}" selected>
                                                    @switch($usuario->rol)
                                                        @case(1)
                                                            Administrador
                                                        @break

                                                        @case(2)
                                                            Aprendiz
                                                        @break

                                                        @case(3)
                                                            Orientador
                                                        @break

                                                        @case(4)
                                                            Gestor
                                                        @break

                                                        @case(5)
                                                            Certificación
                                                        @break
                                                    @endswitch
                                                </option>
                                                <option value="1">Administrador</option>
                                                <option value="2">Aprendiz</option>
                                                <option value="3">Orientador</option>
                                                <option value="4">Gestor</option>
                                                <option value="5">Certificación</option>
                                            </select>
                                            @error('rol')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mt-4">
                                    <button type="submit" class="btn btn-success btn-block">
                                        <i class="fa fa-save"></i> Actualizar Usuario
                                    </button>
                                </div>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
