<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="regional" class="form-label">{{ __('Regional') }}</label>
            <input type="text" name="regional" class="form-control @error('regional') is-invalid @enderror" value="{{ old('regional', $emprendimiento?->regional) }}" id="regional" placeholder="Regional">
            {!! $errors->first('regional', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="centro_formacion" class="form-label">{{ __('Centroformacion') }}</label>
            <input type="text" name="centroFormacion" class="form-control @error('centroFormacion') is-invalid @enderror" value="{{ old('centroFormacion', $emprendimiento?->centroFormacion) }}" id="centro_formacion" placeholder="Centroformacion">
            {!! $errors->first('centroFormacion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="codigo_proyecto" class="form-label">{{ __('Codigoproyecto') }}</label>
            <input type="text" name="codigoProyecto" class="form-control @error('codigoProyecto') is-invalid @enderror" value="{{ old('codigoProyecto', $emprendimiento?->codigoProyecto) }}" id="codigo_proyecto" placeholder="Codigoproyecto">
            {!! $errors->first('codigoProyecto', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="nombres_personal" class="form-label">{{ __('Nombrespersonal') }}</label>
            <input type="text" name="nombresPersonal" class="form-control @error('nombresPersonal') is-invalid @enderror" value="{{ old('nombresPersonal', $emprendimiento?->nombresPersonal) }}" id="nombres_personal" placeholder="Nombrespersonal">
            {!! $errors->first('nombresPersonal', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="apellidos_personal" class="form-label">{{ __('Apellidospersonal') }}</label>
            <input type="text" name="apellidosPersonal" class="form-control @error('apellidosPersonal') is-invalid @enderror" value="{{ old('apellidosPersonal', $emprendimiento?->apellidosPersonal) }}" id="apellidos_personal" placeholder="Apellidospersonal">
            {!! $errors->first('apellidosPersonal', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="documento_personal" class="form-label">{{ __('Documentopersonal') }}</label>
            <input type="text" name="documentoPersonal" class="form-control @error('documentoPersonal') is-invalid @enderror" value="{{ old('documentoPersonal', $emprendimiento?->documentoPersonal) }}" id="documento_personal" placeholder="Documentopersonal">
            {!! $errors->first('documentoPersonal', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fecha_nacimiento" class="form-label">{{ __('Fechanacimiento') }}</label>
            <input type="text" name="fechaNacimiento" class="form-control @error('fechaNacimiento') is-invalid @enderror" value="{{ old('fechaNacimiento', $emprendimiento?->fechaNacimiento) }}" id="fecha_nacimiento" placeholder="Fechanacimiento">
            {!! $errors->first('fechaNacimiento', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="ciudad_nacimiento" class="form-label">{{ __('Ciudadnacimiento') }}</label>
            <input type="text" name="ciudadNacimiento" class="form-control @error('ciudadNacimiento') is-invalid @enderror" value="{{ old('ciudadNacimiento', $emprendimiento?->ciudadNacimiento) }}" id="ciudad_nacimiento" placeholder="Ciudadnacimiento">
            {!! $errors->first('ciudadNacimiento', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="departamento_nacimiento" class="form-label">{{ __('Departamentonacimiento') }}</label>
            <input type="text" name="departamentoNacimiento" class="form-control @error('departamentoNacimiento') is-invalid @enderror" value="{{ old('departamentoNacimiento', $emprendimiento?->departamentoNacimiento) }}" id="departamento_nacimiento" placeholder="Departamentonacimiento">
            {!! $errors->first('departamentoNacimiento', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="correo_personal" class="form-label">{{ __('Correopersonal') }}</label>
            <input type="text" name="correoPersonal" class="form-control @error('correoPersonal') is-invalid @enderror" value="{{ old('correoPersonal', $emprendimiento?->correoPersonal) }}" id="correo_personal" placeholder="Correopersonal">
            {!! $errors->first('correoPersonal', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="genero" class="form-label">{{ __('Genero') }}</label>
            <input type="text" name="genero" class="form-control @error('genero') is-invalid @enderror" value="{{ old('genero', $emprendimiento?->genero) }}" id="genero" placeholder="Genero">
            {!! $errors->first('genero', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="telefono_oficina_personal" class="form-label">{{ __('Telefonooficinapersonal') }}</label>
            <input type="text" name="telefonoOficinaPersonal" class="form-control @error('telefonoOficinaPersonal') is-invalid @enderror" value="{{ old('telefonoOficinaPersonal', $emprendimiento?->telefonoOficinaPersonal) }}" id="telefono_oficina_personal" placeholder="Telefonooficinapersonal">
            {!! $errors->first('telefonoOficinaPersonal', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="telefono_movil_personal" class="form-label">{{ __('Telefonomovilpersonal') }}</label>
            <input type="text" name="telefonoMovilPersonal" class="form-control @error('telefonoMovilPersonal') is-invalid @enderror" value="{{ old('telefonoMovilPersonal', $emprendimiento?->telefonoMovilPersonal) }}" id="telefono_movil_personal" placeholder="Telefonomovilpersonal">
            {!! $errors->first('telefonoMovilPersonal', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="direccion_residencia" class="form-label">{{ __('Direccionresidencia') }}</label>
            <input type="text" name="direccionResidencia" class="form-control @error('direccionResidencia') is-invalid @enderror" value="{{ old('direccionResidencia', $emprendimiento?->direccionResidencia) }}" id="direccion_residencia" placeholder="Direccionresidencia">
            {!! $errors->first('direccionResidencia', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="ciudad_residencia" class="form-label">{{ __('Ciudadresidencia') }}</label>
            <input type="text" name="ciudadResidencia" class="form-control @error('ciudadResidencia') is-invalid @enderror" value="{{ old('ciudadResidencia', $emprendimiento?->ciudadResidencia) }}" id="ciudad_residencia" placeholder="Ciudadresidencia">
            {!! $errors->first('ciudadResidencia', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="departamento_residencia" class="form-label">{{ __('Departamentoresidencia') }}</label>
            <input type="text" name="departamentoResidencia" class="form-control @error('departamentoResidencia') is-invalid @enderror" value="{{ old('departamentoResidencia', $emprendimiento?->departamentoResidencia) }}" id="departamento_residencia" placeholder="Departamentoresidencia">
            {!! $errors->first('departamentoResidencia', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="tipo_poblacion_personal" class="form-label">{{ __('Tipopoblacionpersonal') }}</label>
            <input type="text" name="tipoPoblacionPersonal" class="form-control @error('tipoPoblacionPersonal') is-invalid @enderror" value="{{ old('tipoPoblacionPersonal', $emprendimiento?->tipoPoblacionPersonal) }}" id="tipo_poblacion_personal" placeholder="Tipopoblacionpersonal">
            {!! $errors->first('tipoPoblacionPersonal', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="formacion_academica" class="form-label">{{ __('Formacionacademica') }}</label>
            <input type="text" name="formacionAcademica" class="form-control @error('formacionAcademica') is-invalid @enderror" value="{{ old('formacionAcademica', $emprendimiento?->formacionAcademica) }}" id="formacion_academica" placeholder="Formacionacademica">
            {!! $errors->first('formacionAcademica', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="programa_formacion" class="form-label">{{ __('Programaformacion') }}</label>
            <input type="text" name="programaFormacion" class="form-control @error('programaFormacion') is-invalid @enderror" value="{{ old('programaFormacion', $emprendimiento?->programaFormacion) }}" id="programa_formacion" placeholder="Programaformacion">
            {!! $errors->first('programaFormacion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="institucion_academica" class="form-label">{{ __('Institucionacademica') }}</label>
            <input type="text" name="institucionAcademica" class="form-control @error('institucionAcademica') is-invalid @enderror" value="{{ old('institucionAcademica', $emprendimiento?->institucionAcademica) }}" id="institucion_academica" placeholder="Institucionacademica">
            {!! $errors->first('institucionAcademica', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="estado_academica" class="form-label">{{ __('Estadoacademica') }}</label>
            <input type="text" name="estadoAcademica" class="form-control @error('estadoAcademica') is-invalid @enderror" value="{{ old('estadoAcademica', $emprendimiento?->estadoAcademica) }}" id="estado_academica" placeholder="Estadoacademica">
            {!! $errors->first('estadoAcademica', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="servicio_requerido" class="form-label">{{ __('Serviciorequerido') }}</label>
            <input type="text" name="servicioRequerido" class="form-control @error('servicioRequerido') is-invalid @enderror" value="{{ old('servicioRequerido', $emprendimiento?->servicioRequerido) }}" id="servicio_requerido" placeholder="Serviciorequerido">
            {!! $errors->first('servicioRequerido', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="nombre_empresa" class="form-label">{{ __('Nombreempresa') }}</label>
            <input type="text" name="nombreEmpresa" class="form-control @error('nombreEmpresa') is-invalid @enderror" value="{{ old('nombreEmpresa', $emprendimiento?->nombreEmpresa) }}" id="nombre_empresa" placeholder="Nombreempresa">
            {!! $errors->first('nombreEmpresa', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="nit_empresa" class="form-label">{{ __('Nitempresa') }}</label>
            <input type="text" name="nitEmpresa" class="form-control @error('nitEmpresa') is-invalid @enderror" value="{{ old('nitEmpresa', $emprendimiento?->nitEmpresa) }}" id="nit_empresa" placeholder="Nitempresa">
            {!! $errors->first('nitEmpresa', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="estatus_empresa" class="form-label">{{ __('Estatusempresa') }}</label>
            <input type="text" name="estatusEmpresa" class="form-control @error('estatusEmpresa') is-invalid @enderror" value="{{ old('estatusEmpresa', $emprendimiento?->estatusEmpresa) }}" id="estatus_empresa" placeholder="Estatusempresa">
            {!! $errors->first('estatusEmpresa', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fecha_constitucion_empresa" class="form-label">{{ __('Fechaconstitucionempresa') }}</label>
            <input type="text" name="fechaConstitucionEmpresa" class="form-control @error('fechaConstitucionEmpresa') is-invalid @enderror" value="{{ old('fechaConstitucionEmpresa', $emprendimiento?->fechaConstitucionEmpresa) }}" id="fecha_constitucion_empresa" placeholder="Fechaconstitucionempresa">
            {!! $errors->first('fechaConstitucionEmpresa', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="representante_empresa" class="form-label">{{ __('Representanteempresa') }}</label>
            <input type="text" name="representanteEmpresa" class="form-control @error('representanteEmpresa') is-invalid @enderror" value="{{ old('representanteEmpresa', $emprendimiento?->representanteEmpresa) }}" id="representante_empresa" placeholder="Representanteempresa">
            {!! $errors->first('representanteEmpresa', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="tamano_empresa" class="form-label">{{ __('Tamanoempresa') }}</label>
            <input type="text" name="tamanoEmpresa" class="form-control @error('tamanoEmpresa') is-invalid @enderror" value="{{ old('tamanoEmpresa', $emprendimiento?->tamanoEmpresa) }}" id="tamano_empresa" placeholder="Tamanoempresa">
            {!! $errors->first('tamanoEmpresa', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="actividad_economica_empresa" class="form-label">{{ __('Actividadeconomicaempresa') }}</label>
            <input type="text" name="actividadEconomicaEmpresa" class="form-control @error('actividadEconomicaEmpresa') is-invalid @enderror" value="{{ old('actividadEconomicaEmpresa', $emprendimiento?->actividadEconomicaEmpresa) }}" id="actividad_economica_empresa" placeholder="Actividadeconomicaempresa">
            {!! $errors->first('actividadEconomicaEmpresa', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="sector_economico_empresa" class="form-label">{{ __('Sectoreconomicoempresa') }}</label>
            <input type="text" name="sectorEconomicoEmpresa" class="form-control @error('sectorEconomicoEmpresa') is-invalid @enderror" value="{{ old('sectorEconomicoEmpresa', $emprendimiento?->sectorEconomicoEmpresa) }}" id="sector_economico_empresa" placeholder="Sectoreconomicoempresa">
            {!! $errors->first('sectorEconomicoEmpresa', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="tipo_sociedad_empresa" class="form-label">{{ __('Tiposociedadempresa') }}</label>
            <input type="text" name="tipoSociedadEmpresa" class="form-control @error('tipoSociedadEmpresa') is-invalid @enderror" value="{{ old('tipoSociedadEmpresa', $emprendimiento?->tipoSociedadEmpresa) }}" id="tipo_sociedad_empresa" placeholder="Tiposociedadempresa">
            {!! $errors->first('tipoSociedadEmpresa', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="direccion_empresa" class="form-label">{{ __('Direccionempresa') }}</label>
            <input type="text" name="direccionEmpresa" class="form-control @error('direccionEmpresa') is-invalid @enderror" value="{{ old('direccionEmpresa', $emprendimiento?->direccionEmpresa) }}" id="direccion_empresa" placeholder="Direccionempresa">
            {!! $errors->first('direccionEmpresa', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="pagina_web_empresa" class="form-label">{{ __('Paginawebempresa') }}</label>
            <input type="text" name="paginaWebEmpresa" class="form-control @error('paginaWebEmpresa') is-invalid @enderror" value="{{ old('paginaWebEmpresa', $emprendimiento?->paginaWebEmpresa) }}" id="pagina_web_empresa" placeholder="Paginawebempresa">
            {!! $errors->first('paginaWebEmpresa', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="ciudad_empresa" class="form-label">{{ __('Ciudadempresa') }}</label>
            <input type="text" name="ciudadEmpresa" class="form-control @error('ciudadEmpresa') is-invalid @enderror" value="{{ old('ciudadEmpresa', $emprendimiento?->ciudadEmpresa) }}" id="ciudad_empresa" placeholder="Ciudadempresa">
            {!! $errors->first('ciudadEmpresa', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="departamento_empresa" class="form-label">{{ __('Departamentoempresa') }}</label>
            <input type="text" name="departamentoEmpresa" class="form-control @error('departamentoEmpresa') is-invalid @enderror" value="{{ old('departamentoEmpresa', $emprendimiento?->departamentoEmpresa) }}" id="departamento_empresa" placeholder="Departamentoempresa">
            {!! $errors->first('departamentoEmpresa', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="correo_empresa" class="form-label">{{ __('Correoempresa') }}</label>
            <input type="text" name="correoEmpresa" class="form-control @error('correoEmpresa') is-invalid @enderror" value="{{ old('correoEmpresa', $emprendimiento?->correoEmpresa) }}" id="correo_empresa" placeholder="Correoempresa">
            {!! $errors->first('correoEmpresa', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="empleados_formales" class="form-label">{{ __('Empleadosformales') }}</label>
            <input type="text" name="empleadosFormales" class="form-control @error('empleadosFormales') is-invalid @enderror" value="{{ old('empleadosFormales', $emprendimiento?->empleadosFormales) }}" id="empleados_formales" placeholder="Empleadosformales">
            {!! $errors->first('empleadosFormales', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="empleados_informales" class="form-label">{{ __('Empleadosinformales') }}</label>
            <input type="text" name="empleadosInformales" class="form-control @error('empleadosInformales') is-invalid @enderror" value="{{ old('empleadosInformales', $emprendimiento?->empleadosInformales) }}" id="empleados_informales" placeholder="Empleadosinformales">
            {!! $errors->first('empleadosInformales', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="descripcion_productos_empresa" class="form-label">{{ __('Descripcionproductosempresa') }}</label>
            <input type="text" name="descripcionProductosEmpresa" class="form-control @error('descripcionProductosEmpresa') is-invalid @enderror" value="{{ old('descripcionProductosEmpresa', $emprendimiento?->descripcionProductosEmpresa) }}" id="descripcion_productos_empresa" placeholder="Descripcionproductosempresa">
            {!! $errors->first('descripcionProductosEmpresa', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="internet_empresa" class="form-label">{{ __('Internetempresa') }}</label>
            <input type="text" name="internetEmpresa" class="form-control @error('internetEmpresa') is-invalid @enderror" value="{{ old('internetEmpresa', $emprendimiento?->internetEmpresa) }}" id="internet_empresa" placeholder="Internetempresa">
            {!! $errors->first('internetEmpresa', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="negocio_en_casa" class="form-label">{{ __('Negocioencasa') }}</label>
            <input type="text" name="negocioEnCasa" class="form-control @error('negocioEnCasa') is-invalid @enderror" value="{{ old('negocioEnCasa', $emprendimiento?->negocioEnCasa) }}" id="negocio_en_casa" placeholder="Negocioencasa">
            {!! $errors->first('negocioEnCasa', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>