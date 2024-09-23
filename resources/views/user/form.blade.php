<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="nombres" class="form-label">{{ __('Nombres') }}</label>
            <input type="text" name="nombres" class="form-control @error('nombres') is-invalid @enderror" value="{{ old('nombres', $user?->nombres) }}" id="nombres" placeholder="Nombres">
            {!! $errors->first('nombres', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="apellidos" class="form-label">{{ __('Apellidos') }}</label>
            <input type="text" name="apellidos" class="form-control @error('apellidos') is-invalid @enderror" value="{{ old('apellidos', $user?->apellidos) }}" id="apellidos" placeholder="Apellidos">
            {!! $errors->first('apellidos', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="sexo" class="form-label">{{ __('Sexo') }}</label>
            <input type="text" name="sexo" class="form-control @error('sexo') is-invalid @enderror" value="{{ old('sexo', $user?->sexo) }}" id="sexo" placeholder="Sexo">
            {!! $errors->first('sexo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="tipodocumento" class="form-label">{{ __('Tipodocumento') }}</label>
            <input type="text" name="tipodocumento" class="form-control @error('tipodocumento') is-invalid @enderror" value="{{ old('tipodocumento', $user?->tipodocumento) }}" id="tipodocumento" placeholder="Tipodocumento">
            {!! $errors->first('tipodocumento', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="documento" class="form-label">{{ __('Documento') }}</label>
            <input type="text" name="documento" class="form-control @error('documento') is-invalid @enderror" value="{{ old('documento', $user?->documento) }}" id="documento" placeholder="Documento">
            {!! $errors->first('documento', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fecha_nacimiento" class="form-label">{{ __('Fechanacimiento') }}</label>
            <input type="text" name="fechaNacimiento" class="form-control @error('fechaNacimiento') is-invalid @enderror" value="{{ old('fechaNacimiento', $user?->fechaNacimiento) }}" id="fecha_nacimiento" placeholder="Fechanacimiento">
            {!! $errors->first('fechaNacimiento', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="telefono" class="form-label">{{ __('Telefono') }}</label>
            <input type="text" name="telefono" class="form-control @error('telefono') is-invalid @enderror" value="{{ old('telefono', $user?->telefono) }}" id="telefono" placeholder="Telefono">
            {!! $errors->first('telefono', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="tipo_poblacion" class="form-label">{{ __('Tipopoblacion') }}</label>
            <input type="text" name="tipoPoblacion" class="form-control @error('tipoPoblacion') is-invalid @enderror" value="{{ old('tipoPoblacion', $user?->tipoPoblacion) }}" id="tipo_poblacion" placeholder="Tipopoblacion">
            {!! $errors->first('tipoPoblacion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="centro" class="form-label">{{ __('Centro') }}</label>
            <input type="text" name="centro" class="form-control @error('centro') is-invalid @enderror" value="{{ old('centro', $user?->centro) }}" id="centro" placeholder="Centro">
            {!! $errors->first('centro', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="municipio" class="form-label">{{ __('Municipio') }}</label>
            <input type="text" name="municipio" class="form-control @error('municipio') is-invalid @enderror" value="{{ old('municipio', $user?->municipio) }}" id="municipio" placeholder="Municipio">
            {!! $errors->first('municipio', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="email" class="form-label">{{ __('Email') }}</label>
            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user?->email) }}" id="email" placeholder="Email">
            {!! $errors->first('email', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="rol" class="form-label">{{ __('Rol') }}</label>
            <input type="text" name="rol" class="form-control @error('rol') is-invalid @enderror" value="{{ old('rol', $user?->rol) }}" id="rol" placeholder="Rol">
            {!! $errors->first('rol', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fecha_registro" class="form-label">{{ __('Fecharegistro') }}</label>
            <input type="text" name="fechaRegistro" class="form-control @error('fechaRegistro') is-invalid @enderror" value="{{ old('fechaRegistro', $user?->fechaRegistro) }}" id="fecha_registro" placeholder="Fecharegistro">
            {!! $errors->first('fechaRegistro', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fecha_sesion" class="form-label">{{ __('Fecha Sesion') }}</label>
            <input type="text" name="fecha_sesion" class="form-control @error('fecha_sesion') is-invalid @enderror" value="{{ old('fecha_sesion', $user?->fecha_sesion) }}" id="fecha_sesion" placeholder="Fecha Sesion">
            {!! $errors->first('fecha_sesion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="img" class="form-label">{{ __('Img') }}</label>
            <input type="text" name="img" class="form-control @error('img') is-invalid @enderror" value="{{ old('img', $user?->img) }}" id="img" placeholder="Img">
            {!! $errors->first('img', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="tipo_archivo" class="form-label">{{ __('Tipo Archivo') }}</label>
            <input type="text" name="tipo_archivo" class="form-control @error('tipo_archivo') is-invalid @enderror" value="{{ old('tipo_archivo', $user?->tipo_archivo) }}" id="tipo_archivo" placeholder="Tipo Archivo">
            {!! $errors->first('tipo_archivo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>