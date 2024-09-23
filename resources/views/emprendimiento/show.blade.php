@extends('layouts.app')

@section('template_title')
    {{ $emprendimiento->name ?? __('Show') . " " . __('Emprendimiento') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Emprendimiento</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('emprendimientos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Regional:</strong>
                                    {{ $emprendimiento->regional }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Centroformacion:</strong>
                                    {{ $emprendimiento->centroFormacion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Codigoproyecto:</strong>
                                    {{ $emprendimiento->codigoProyecto }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Nombrespersonal:</strong>
                                    {{ $emprendimiento->nombresPersonal }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Apellidospersonal:</strong>
                                    {{ $emprendimiento->apellidosPersonal }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Documentopersonal:</strong>
                                    {{ $emprendimiento->documentoPersonal }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fechanacimiento:</strong>
                                    {{ $emprendimiento->fechaNacimiento }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Ciudadnacimiento:</strong>
                                    {{ $emprendimiento->ciudadNacimiento }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Departamentonacimiento:</strong>
                                    {{ $emprendimiento->departamentoNacimiento }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Correopersonal:</strong>
                                    {{ $emprendimiento->correoPersonal }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Genero:</strong>
                                    {{ $emprendimiento->genero }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Telefonooficinapersonal:</strong>
                                    {{ $emprendimiento->telefonoOficinaPersonal }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Telefonomovilpersonal:</strong>
                                    {{ $emprendimiento->telefonoMovilPersonal }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Direccionresidencia:</strong>
                                    {{ $emprendimiento->direccionResidencia }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Ciudadresidencia:</strong>
                                    {{ $emprendimiento->ciudadResidencia }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Departamentoresidencia:</strong>
                                    {{ $emprendimiento->departamentoResidencia }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Tipopoblacionpersonal:</strong>
                                    {{ $emprendimiento->tipoPoblacionPersonal }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Formacionacademica:</strong>
                                    {{ $emprendimiento->formacionAcademica }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Programaformacion:</strong>
                                    {{ $emprendimiento->programaFormacion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Institucionacademica:</strong>
                                    {{ $emprendimiento->institucionAcademica }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Estadoacademica:</strong>
                                    {{ $emprendimiento->estadoAcademica }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Serviciorequerido:</strong>
                                    {{ $emprendimiento->servicioRequerido }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Nombreempresa:</strong>
                                    {{ $emprendimiento->nombreEmpresa }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Nitempresa:</strong>
                                    {{ $emprendimiento->nitEmpresa }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Estatusempresa:</strong>
                                    {{ $emprendimiento->estatusEmpresa }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fechaconstitucionempresa:</strong>
                                    {{ $emprendimiento->fechaConstitucionEmpresa }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Representanteempresa:</strong>
                                    {{ $emprendimiento->representanteEmpresa }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Tamanoempresa:</strong>
                                    {{ $emprendimiento->tamanoEmpresa }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Actividadeconomicaempresa:</strong>
                                    {{ $emprendimiento->actividadEconomicaEmpresa }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Sectoreconomicoempresa:</strong>
                                    {{ $emprendimiento->sectorEconomicoEmpresa }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Tiposociedadempresa:</strong>
                                    {{ $emprendimiento->tipoSociedadEmpresa }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Direccionempresa:</strong>
                                    {{ $emprendimiento->direccionEmpresa }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Paginawebempresa:</strong>
                                    {{ $emprendimiento->paginaWebEmpresa }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Ciudadempresa:</strong>
                                    {{ $emprendimiento->ciudadEmpresa }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Departamentoempresa:</strong>
                                    {{ $emprendimiento->departamentoEmpresa }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Correoempresa:</strong>
                                    {{ $emprendimiento->correoEmpresa }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Empleadosformales:</strong>
                                    {{ $emprendimiento->empleadosFormales }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Empleadosinformales:</strong>
                                    {{ $emprendimiento->empleadosInformales }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Descripcionproductosempresa:</strong>
                                    {{ $emprendimiento->descripcionProductosEmpresa }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Internetempresa:</strong>
                                    {{ $emprendimiento->internetEmpresa }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Negocioencasa:</strong>
                                    {{ $emprendimiento->negocioEnCasa }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
