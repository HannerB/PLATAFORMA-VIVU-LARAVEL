<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="nombre_grupo" class="form-label">{{ __('Nombre Grupo') }}</label>
            <input type="text" name="nombre_grupo" class="form-control @error('nombre_grupo') is-invalid @enderror" value="{{ old('nombre_grupo', $grupo?->nombre_grupo) }}" id="nombre_grupo" placeholder="Nombre Grupo">
            {!! $errors->first('nombre_grupo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="tipo_archivo" class="form-label">{{ __('Tipo Archivo') }}</label>
            <input type="text" name="tipo_archivo" class="form-control @error('tipo_archivo') is-invalid @enderror" value="{{ old('tipo_archivo', $grupo?->tipo_archivo) }}" id="tipo_archivo" placeholder="Tipo Archivo">
            {!! $errors->first('tipo_archivo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="nombre_archivo" class="form-label">{{ __('Nombre Archivo') }}</label>
            <input type="text" name="nombre_archivo" class="form-control @error('nombre_archivo') is-invalid @enderror" value="{{ old('nombre_archivo', $grupo?->nombre_archivo) }}" id="nombre_archivo" placeholder="Nombre Archivo">
            {!! $errors->first('nombre_archivo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>