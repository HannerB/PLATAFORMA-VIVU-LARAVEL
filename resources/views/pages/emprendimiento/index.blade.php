@extends('layouts.app')

@section('title', 'Emprendimiento | Oferta Complementaria')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container down">
        <div class="contentContainer">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="pservices text-justify">
                            <h5 class="card-header info-color white-text text-center py-4">
                                <strong>SERVICIO NACIONAL DE APRENDIZAJE SENA</strong><br>
                                <strong>GESTION DE EMPRENDIMIENTO Y EMPRESARISMO</strong><br>
                                <strong>FORMATO DE INSCRIPCIÓN AL SERVICIO DE ASESORIA</strong>
                            </h5>
                        </div>
                        <div class="card-body px-lg-5 pt-0"></div>
                    </div>

                    <form action="{{ route('emprendimiento.store') }}" method="POST">
                        @csrf
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <!-- Sección SENA -->
                            <div class="panel panel-default mt-2">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion"
                                            href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Sena.edu.co
                                        </a>
                                        <a role="button" data-toggle="collapse" data-parent="#accordion"
                                            href="#collapseOne" aria-expanded="true" aria-controls="collapseOne"
                                            class="col-md-10">
                                            INSCRIPCIÓN AL SERVICIO DE ASESORÍA
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse show" role="tabpanel"
                                    aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Regional</label>
                                                <input type="text" class="form-control" placeholder="Regional" required
                                                    name="txtRegional">
                                            </div>
                                            <div class="col-md-5">
                                                <label>Centro SBDC (Centro de Formación)</label>
                                                <input type="text" class="form-control" placeholder="Centro de Formacion"
                                                    required name="txtCentro">
                                            </div>
                                            <div class="col-md-3">
                                                <label>Código del proyecto</label>
                                                <input type="text" class="form-control" placeholder="Codigo del Proyecto"
                                                    required name="txtCodigoProyecto">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Información del cliente -->
                            <div class="panel panel-default mt-2">
                                <div class="panel-heading" role="tab" id="headingTwo">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                                            href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            Información del cliente
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel"
                                    aria-labelledby="headingTwo">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Nombres</label><br>
                                                <input type="text" class="form-control" placeholder="Nombres"
                                                    required="" name="txtNombres">
                                            </div>

                                            <div class="col-md-6">
                                                <label>Apellidos</label><br>
                                                <input type="text" class="form-control" placeholder="Apellidos"
                                                    required="" name="txtApellidos">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Documento de Identidad</label><br>
                                                <input type="text" class="form-control"
                                                    placeholder="Documento de Identidad" required=""
                                                    name="txtDocumento">
                                            </div>
                                            <div class="col-md-3">
                                                <label>Fecha de Nacimiento</label><br>
                                                <input type="date" class="form-control" placeholder="AAAA/MM/DD"
                                                    required="" name="txtFechaNacimiento">
                                            </div>
                                            <div class="col-md-3">
                                                <label>Ciudad Nacimiento</label><br>
                                                <input id="" class="form-control" required=""
                                                    name="txtCiudadNacimiento">
                                            </div>
                                            <div class="col-md-3">
                                                <label>Departamento Nacimiento</label><br>
                                                <input id="" class="form-control" required=""
                                                    name="txtDepartamentoNacimiento">

                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Correo electrónico (e-mail)</label>
                                                <input type="email" class="form-control"
                                                    placeholder="Correo electrónico (e-mail):" required=""
                                                    name="txtCorreo">
                                            </div>

                                            <div class="col-md-6">
                                                <label>Genero</label><br>
                                                <label class="checkbox-inline"><input type="radio" name="txtGenero"
                                                        value="Masculino">Masculino</label>
                                                <label class="checkbox-inline"><input type="radio" name="txtGenero"
                                                        value="Femenino">Femenino</label>
                                                <label class="checkbox-inline"><input type="radio" name="txtGenero"
                                                        value="Prefiero no decirlo">Prefiero no decirlo</label>
                                            </div>
                                        </div>

                                        <div class="row">

                                            <div class="col-md-6">
                                                <label>Teléfono de Oficina</label><br>
                                                <input type="text" class="form-control"
                                                    placeholder="Teléfono de Oficina" required=""
                                                    name="txtTelefonoOficina">
                                            </div>

                                            <div class="col-md-6">
                                                <label>Teléfono Movil</label><br>
                                                <input type="text" class="form-control" placeholder="Teléfono Movil"
                                                    required="" name="txtTelefonoMovil">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>Direccion de Residencia</label>
                                                <input type="text" class="form-control"
                                                    placeholder="Digite su Direccion de Residencia Completa"
                                                    required="" name="txtDireccion">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Ciudad de residencia</label><br>
                                                <input type="text" class="form-control" required=""
                                                    name="txtCiudadResidencia">
                                            </div>
                                            <div class="col-md-6">
                                                <label>Departamento de residencia</label><br>
                                                <input type="text" class="form-control" required=""
                                                    name="txtDepartamentoResidencia">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>Caracterización especial de la población</label><br>
                                                <label class="checkbox-inline"><input type="radio"
                                                        name="txtCaracterizacion" value="Edad entre 15 y 18 Años">Edad
                                                    entre 15 y 18 Años</label>
                                                <label class="checkbox-inline"><input type="radio"
                                                        name="txtCaracterizacion"
                                                        value="Desplazado por la violencia">Desplazado por la
                                                    violencia</label>
                                                <label class="checkbox-inline"><input type="radio"
                                                        name="txtCaracterizacion" value="Madre Cabeza de Familia">Madre
                                                    Cabeza de Familia</label>
                                                <label class="checkbox-inline"><input type="radio"
                                                        name="txtCaracterizacion"
                                                        value="Minoría étnica (Indígena o Negritud)">Minoría étnica
                                                    (Indígena o Negritud)</label>
                                                <label class="checkbox-inline"><input type="radio"
                                                        name="txtCaracterizacion" value="Recluido cárceles INPEC">Recluido
                                                    cárceles INPEC</label>
                                                <label class="checkbox-inline"><input type="radio"
                                                        name="txtCaracterizacion"
                                                        value="Desmovilizado o reinsertado">Desmovilizado o
                                                    reinsertado</label>
                                                <label class="checkbox-inline"><input type="radio"
                                                        name="txtCaracterizacion" value="Con Discapacidad">Con
                                                    Discapacidad</label>
                                                <label class="checkbox-inline"><input type="radio"
                                                        name="txtCaracterizacion" value="Otro:">Otro:</label>
                                                <label class="checkbox-inline">¿Cual?</label><input type="text"
                                                    value="">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-8">
                                                <label>Formación Académica</label><br>
                                                <label class="checkbox-inline"><input type="radio" name="txtFormacion"
                                                        value="Aprendiz SENA">Aprendiz SENA</label>
                                                <label class="checkbox-inline"><input type="radio" name="txtFormacion"
                                                        value="Técnico">Técnico</label>
                                                <label class="checkbox-inline"><input type="radio" name="txtFormacion"
                                                        value="Tecnólogo">Tecnólogo</label>
                                                <label class="checkbox-inline"><input type="radio" name="txtFormacion"
                                                        value="Profesional Universitario">Profesional Universitario</label>
                                                <label class="checkbox-inline"><input type="radio" name="txtFormacion"
                                                        value="Especialista">Especialista</label>
                                                <label class="checkbox-inline"><input type="radio" name="txtFormacion"
                                                        value="Maestría">Maestría</label>
                                                <label class="checkbox-inline"><input type="radio" name="txtFormacion"
                                                        value="Doctorado">Doctorado</label>
                                                <label class="checkbox-inline"><input type="radio" name="txtFormacion"
                                                        value="Otro">Otro:</label>
                                                <label class="checkbox-inline">¿Cual?</label><input type="text"
                                                    value="">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Programa de Formación</label><br>
                                                <input type="text" class="form-control"
                                                    placeholder="Programa de Formación" name="txtProgramaFormacion"
                                                    required="">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-8">
                                                <label>Institución Educativa</label><br>
                                                <input type="text" class="form-control" required=""
                                                    name="txtInstitucion">
                                            </div>

                                            <div class="col-md-4">
                                                <label>Estado</label><br>
                                                <label class="checkbox-inline"><input type="radio"
                                                        name="txtEstadoInstitucion" value="En Curso">En Curso</label>
                                                <label class="checkbox-inline"><input type="radio"
                                                        name="txtEstadoInstitucion" value="Finalizado">Finalizado</label>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>Servicio Requerido: (Exclusivo para Gestor)</label><br>
                                                <label class="checkbox-inline"><input type="radio" name="txtServicio"
                                                        value="Fortalecimiento Unidad Productiva">Fortalecimiento Unidad
                                                    Productiva</label>
                                                <label class="checkbox-inline"><input type="radio" name="txtServicio"
                                                        value="Creación de Empresa Fondo Emprender">Creación de Empresa
                                                    Fondo Emprender</label>
                                                <label class="checkbox-inline"><input type="radio" name="txtServicio"
                                                        value="Puesta en Marcha Empresa Fondo Emprender">Puesta en Marcha
                                                    Empresa Fondo Emprender</label>
                                                <label class="checkbox-inline"><input type="radio" name="txtServicio"
                                                        value="Creación de Empresa Otras Fuentes de Financiación">Creación
                                                    de Empresa Otras Fuentes de Financiación</label>
                                                <label class="checkbox-inline"><input type="radio" name="txtServicio"
                                                        value="Puesta en Marcha Empresa Otras Fuentes financiación">Puesta
                                                    en Marcha Empresa Otras Fuentes financiación</label>
                                                <label class="checkbox-inline"><input type="radio" name="txtServicio"
                                                        value="Fortalecimiento Empresarial">Fortalecimiento
                                                    Empresarial</label>
                                                <label class="checkbox-inline"><input type="radio" name="txtServicio"
                                                        value="Otro">Otro:</label>
                                                <label class="checkbox-inline">¿Cual?</label><input type="text"
                                                    value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Información de la Empresa -->
                            <div class="panel panel-default  mt-2">
                                <div class="panel-heading" role="tab" id="headingThree">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse"
                                            data-parent="#accordion" href="#collapseThree" aria-expanded="false"
                                            aria-controls="collapseThree">
                                            Información de la Empresa
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel"
                                    aria-labelledby="headingThree">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <label>Nombre de la Empresa o Idea de Negocio</label><br>
                                                <input type="text" class="form-control"
                                                    placeholder="Nombre de la Empresa o Idea de Negocio" required=""
                                                    name="txtEmpresa">
                                            </div>

                                            <div class="col-md-4">
                                                <label>Nit</label><br>
                                                <input type="number" class="form-control" placeholder="Nit"
                                                    required="" name="txtNit">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-7">
                                                <label>Estatus</label><br>
                                                <label class="checkbox-inline"><input type="radio" name="txtEstatus"
                                                        value="Emprendedor (idea de negocio)">Emprendedor (idea de
                                                    negocio)</label>
                                                <label class="checkbox-inline"><input type="radio" name="txtEstatus"
                                                        value="Empresa establecida">Empresa establecida</label>
                                                <label class="checkbox-inline"><input type="radio" name="txtEstatus"
                                                        value="Gacela">Gacela</label>
                                                <label class="checkbox-inline"><input type="radio" name="txtEstatus"
                                                        value="Emprendedor con Unidad Productiva">Emprendedor con Unidad
                                                    Productiva</label>
                                            </div>

                                            <div class="col-md-5">
                                                <label>Fecha de Constitución de la empresa</label>
                                                <input type="date" class="form-control" required=""
                                                    name="txtFechaConstitucion">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-5">
                                                <label>Representante Legal</label><br>
                                                <input type="text" class="form-control"
                                                    placeholder="Representante Legal" required=""
                                                    name="txtRepresentanteLegal">
                                            </div>

                                            <div class="col-md-4">
                                                <label>Tamaño de la empresa</label><br>
                                                <label class="checkbox-inline"><input type="radio"
                                                        name="txtTamanoEmpresa" value="Micro">Micro</label>
                                                <label class="checkbox-inline"><input type="radio"
                                                        name="txtTamanoEmpresa" value="Pequeña">Pequeña</label>
                                                <label class="checkbox-inline"><input type="radio"
                                                        name="txtTamanoEmpresa" value="Mediana">Mediana</label>
                                            </div>
                                            <div class="col-md-3">
                                                <label>Actividad Económica (CIIU)</label><br>
                                                <input type="text" class="form-control" required=""
                                                    name="txtActividadEconomica">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>Sector Económico</label><br>
                                                <label class="checkbox-inline"><input type="radio"
                                                        name="txtSectorEconomico"
                                                        value="Agropecuario">Agropecuario</label>
                                                <label class="checkbox-inline"><input type="radio"
                                                        name="txtSectorEconomico" value="Servicios">Servicios</label>
                                                <label class="checkbox-inline"><input type="radio"
                                                        name="txtSectorEconomico" value="Industrial">Industrial</label>
                                                <label class="checkbox-inline"><input type="radio"
                                                        name="txtSectorEconomico" value="Comercio">Comercio</label>
                                                <label class="checkbox-inline"><input type="radio"
                                                        name="txtSectorEconomico" value="Otro">Otro</label>
                                                <label class="checkbox-inline">¿Cual?</label><input type="text"
                                                    value="">
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>Tipo de Sociedad</label><br>
                                                <label class="checkbox-inline"><input type="radio"
                                                        name="txtTipoSociedad" value="S.A.S.">S.A.S.</label>
                                                <label class="checkbox-inline"><input type="radio"
                                                        name="txtTipoSociedad" value="S.A.">S.A.</label>
                                                <label class="checkbox-inline"><input type="radio"
                                                        name="txtTipoSociedad" value="LTDA">LTDA</label>
                                                <label class="checkbox-inline"><input type="radio"
                                                        name="txtTipoSociedad" value="Fundaciones">Fundaciones</label>
                                                <label class="checkbox-inline"><input type="radio"
                                                        name="txtTipoSociedad" value="Cooperativas">Cooperativas</label>
                                                <label class="checkbox-inline"><input type="radio"
                                                        name="txtTipoSociedad" value="Persona Natural">Persona
                                                    Natural</label>
                                                <label class="checkbox-inline"><input type="radio"
                                                        name="txtTipoSociedad" value="Otra">Otra</label>
                                                <label class="checkbox-inline">¿Cual?</label><input type="text"
                                                    value="">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-8">
                                                <label>Dirección Empresa</label><br>
                                                <input type="text" class="form-control"
                                                    placeholder="Dirección Empresa" required=""
                                                    name="txtDireccionEmpresa">
                                            </div>

                                            <div class="col-md-4">
                                                <label>Página web</label><br>
                                                <input type="text" class="form-control" placeholder="Página web"
                                                    name="txtPaginaWeb">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Ciudad</label><br>
                                                <input id="" class="form-control" required=""
                                                    name="txtCiudadEmpresa">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Departamento</label><br>
                                                <input id="" class="form-control" required=""
                                                    name="txtDepartamentoEmpresa">

                                            </div>
                                            <div class="col-md-4">
                                                <label>Correo Electrónico</label><br>
                                                <input type="email" name="txtCorreoEmpresa" value=""
                                                    class="form-control">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Número Empleos Formales</label>
                                                <input type="number" maxlength="1000" required=""
                                                    name="txtNumeroEmpleosFormales" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Número de Empleos Informales</label>
                                                <input type="number" maxlength="1000" required=""
                                                    name="txtNumeroEmpleosInformales" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Descripción de Productos/Servicios</label><br>
                                                <textarea required="" name="txtDescripcion" cols="44" rows="2"></textarea>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>¿Realiza negocios por Internet?</label><br>
                                                <label class="checkbox-inline"><input type="radio"
                                                        name="txtVendeInternet" value="SI">SI</label>
                                                <label class="checkbox-inline"><input type="radio"
                                                        name="txtVendeInternet" value="NO">NO</label>
                                            </div>
                                            <div class="col-md-6">
                                                <label>¿El negocio está establecido en su casa?</label><br>
                                                <label class="checkbox-inline">
                                                    <input type="radio" name="txtNegocioCasa" value="SI"
                                                        required>SI
                                                </label>
                                                <label class="checkbox-inline">
                                                    <input type="radio" name="txtNegocioCasa" value="NO"
                                                        required>NO
                                                </label>
                                                @error('txtNegocioCasa')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Confidencialidad -->
                            <div class="container border-form mt-2">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p class="pservices text-justify">
                                            CONFIDENCIALIDAD Las partes mantendrán la confidencialidad de los datos e
                                            información intercambiados entre ellas...
                                            <strong>Recuerde que los servicios ofrecidos por los SENA SBDC Centros de
                                                Desarrollo Empresarial son gratuitos e indiscriminados...</strong>
                                        </p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-9">
                                        <label>Firma del Cliente</label>
                                        <input type="text" class="form-control" placeholder="Firme Aqui"
                                            name="txtFirmaCliente">
                                    </div>
                                    <div class="col-md-3">
                                        <label>Fecha</label>
                                        <input type="date" class="form-control" name="fechaFirmaCliente">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-9">
                                        <label>Firma del Gestor</label>
                                        <input type="text" class="form-control" placeholder="Firme Aqui"
                                            name="txtFirmaGestor">
                                    </div>
                                    <div class="col-md-3">
                                        <label>Fecha</label>
                                        <input type="date" class="form-control" name="fechaFirmaGestor">
                                    </div>
                                </div>
                                <br>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-12">
                                <button type="submit" class="btn form-control"
                                    style="background-color: #00AF00; color: white;">
                                    Enviar Formulario
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .panel-heading {
            background-color: #f8f9fa;
            padding: 10px 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .panel-title a {
            color: #333;
            text-decoration: none;
        }

        .panel-body {
            padding: 15px;
            border: 1px solid #ddd;
            border-top: 0;
        }

        .form-check-inline {
            margin-right: 1rem;
        }
    </style>
@endpush

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.collapse').on('show.bs.collapse', function() {
                $(this).siblings('.panel-heading').addClass('active');
            });

            $('.collapse').on('hide.bs.collapse', function() {
                $(this).siblings('.panel-heading').removeClass('active');
            });
        });
    </script>
@endpush
