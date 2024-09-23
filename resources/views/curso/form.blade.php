<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="codigo_curso" class="form-label">{{ __('Codigo Curso') }}</label>
            <input type="text" name="codigo_curso" class="form-control @error('codigo_curso') is-invalid @enderror" value="{{ old('codigo_curso', $curso?->codigo_curso) }}" id="codigo_curso" placeholder="Codigo Curso">
            {!! $errors->first('codigo_curso', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="curso" class="form-label">{{ __('Curso') }}</label>
            <input type="text" name="curso" class="form-control @error('curso') is-invalid @enderror" value="{{ old('curso', $curso?->curso) }}" id="curso" placeholder="Curso">
            {!! $errors->first('curso', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="jornada" class="form-label">{{ __('Jornada') }}</label>
            <input type="text" name="jornada" class="form-control @error('jornada') is-invalid @enderror" value="{{ old('jornada', $curso?->jornada) }}" id="jornada" placeholder="Jornada">
            {!! $errors->first('jornada', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="horario" class="form-label">{{ __('Horario') }}</label>
            <input type="text" name="horario" class="form-control @error('horario') is-invalid @enderror" value="{{ old('horario', $curso?->horario) }}" id="horario" placeholder="Horario">
            {!! $errors->first('horario', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="intensidad" class="form-label">{{ __('Intensidad') }}</label>
            <input type="text" name="intensidad" class="form-control @error('intensidad') is-invalid @enderror" value="{{ old('intensidad', $curso?->intensidad) }}" id="intensidad" placeholder="Intensidad">
            {!! $errors->first('intensidad', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fecha_inicio" class="form-label">{{ __('Fecha Inicio') }}</label>
            <input type="text" name="fecha_inicio" class="form-control @error('fecha_inicio') is-invalid @enderror" value="{{ old('fecha_inicio', $curso?->fecha_inicio) }}" id="fecha_inicio" placeholder="Fecha Inicio">
            {!! $errors->first('fecha_inicio', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="municipio" class="form-label">{{ __('Municipio') }}</label>
            <input type="text" name="municipio" class="form-control @error('municipio') is-invalid @enderror" value="{{ old('municipio', $curso?->municipio) }}" id="municipio" placeholder="Municipio">
            {!! $errors->first('municipio', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="direccion" class="form-label">{{ __('Direccion') }}</label>
            <input type="text" name="direccion" class="form-control @error('direccion') is-invalid @enderror" value="{{ old('direccion', $curso?->direccion) }}" id="direccion" placeholder="Direccion">
            {!! $errors->first('direccion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="formacion" class="form-label">{{ __('Formacion') }}</label>
            <input type="text" name="formacion" class="form-control @error('formacion') is-invalid @enderror" value="{{ old('formacion', $curso?->formacion) }}" id="formacion" placeholder="Formacion">
            {!! $errors->first('formacion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="centro" class="form-label">{{ __('Centro') }}</label>
            <input type="text" name="centro" class="form-control @error('centro') is-invalid @enderror" value="{{ old('centro', $curso?->centro) }}" id="centro" placeholder="Centro">
            {!! $errors->first('centro', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="descripcion" class="form-label">{{ __('Descripcion') }}</label>
            <input type="text" name="descripcion" class="form-control @error('descripcion') is-invalid @enderror" value="{{ old('descripcion', $curso?->descripcion) }}" id="descripcion" placeholder="Descripcion">
            {!! $errors->first('descripcion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="nombre_grupo" class="form-label">{{ __('Nombre Grupo') }}</label>
            <input type="text" name="nombre_grupo" class="form-control @error('nombre_grupo') is-invalid @enderror" value="{{ old('nombre_grupo', $curso?->nombre_grupo) }}" id="nombre_grupo" placeholder="Nombre Grupo">
            {!! $errors->first('nombre_grupo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="estado" class="form-label">{{ __('Estado') }}</label>
            <input type="text" name="estado" class="form-control @error('estado') is-invalid @enderror" value="{{ old('estado', $curso?->estado) }}" id="estado" placeholder="Estado">
            {!! $errors->first('estado', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="rol" class="form-label">{{ __('Rol') }}</label>
            <input type="text" name="rol" class="form-control @error('rol') is-invalid @enderror" value="{{ old('rol', $curso?->rol) }}" id="rol" placeholder="Rol">
            {!! $errors->first('rol', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fecha_registro" class="form-label">{{ __('Fecharegistro') }}</label>
            <input type="text" name="fechaRegistro" class="form-control @error('fechaRegistro') is-invalid @enderror" value="{{ old('fechaRegistro', $curso?->fechaRegistro) }}" id="fecha_registro" placeholder="Fecharegistro">
            {!! $errors->first('fechaRegistro', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>