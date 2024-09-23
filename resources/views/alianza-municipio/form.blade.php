<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="id_alianza" class="form-label">{{ __('Id Alianza') }}</label>
            <input type="text" name="id_alianza" class="form-control @error('id_alianza') is-invalid @enderror" value="{{ old('id_alianza', $alianzaMunicipio?->id_alianza) }}" id="id_alianza" placeholder="Id Alianza">
            {!! $errors->first('id_alianza', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="id__user" class="form-label">{{ __('Id User') }}</label>
            <input type="text" name="id_User" class="form-control @error('id_User') is-invalid @enderror" value="{{ old('id_User', $alianzaMunicipio?->id_User) }}" id="id__user" placeholder="Id User">
            {!! $errors->first('id_User', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="municipio" class="form-label">{{ __('Municipio') }}</label>
            <input type="text" name="municipio" class="form-control @error('municipio') is-invalid @enderror" value="{{ old('municipio', $alianzaMunicipio?->municipio) }}" id="municipio" placeholder="Municipio">
            {!! $errors->first('municipio', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="periodo" class="form-label">{{ __('Periodo') }}</label>
            <input type="text" name="periodo" class="form-control @error('periodo') is-invalid @enderror" value="{{ old('periodo', $alianzaMunicipio?->periodo) }}" id="periodo" placeholder="Periodo">
            {!! $errors->first('periodo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="enlace_poblacion" class="form-label">{{ __('Enlace Poblacion') }}</label>
            <input type="text" name="enlace_poblacion" class="form-control @error('enlace_poblacion') is-invalid @enderror" value="{{ old('enlace_poblacion', $alianzaMunicipio?->enlace_poblacion) }}" id="enlace_poblacion" placeholder="Enlace Poblacion">
            {!! $errors->first('enlace_poblacion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="cargo" class="form-label">{{ __('Cargo') }}</label>
            <input type="text" name="cargo" class="form-control @error('cargo') is-invalid @enderror" value="{{ old('cargo', $alianzaMunicipio?->cargo) }}" id="cargo" placeholder="Cargo">
            {!! $errors->first('cargo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="estado" class="form-label">{{ __('Estado') }}</label>
            <input type="text" name="estado" class="form-control @error('estado') is-invalid @enderror" value="{{ old('estado', $alianzaMunicipio?->estado) }}" id="estado" placeholder="Estado">
            {!! $errors->first('estado', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="poa_id" class="form-label">{{ __('Poa Id') }}</label>
            <input type="text" name="poa_id" class="form-control @error('poa_id') is-invalid @enderror" value="{{ old('poa_id', $alianzaMunicipio?->poa_id) }}" id="poa_id" placeholder="Poa Id">
            {!! $errors->first('poa_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>