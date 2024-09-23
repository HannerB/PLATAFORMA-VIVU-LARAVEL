<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="id_acceso" class="form-label">{{ __('Id Acceso') }}</label>
            <input type="text" name="id_acceso" class="form-control @error('id_acceso') is-invalid @enderror" value="{{ old('id_acceso', $accesoRegistro?->id_acceso) }}" id="id_acceso" placeholder="Id Acceso">
            {!! $errors->first('id_acceso', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="estado" class="form-label">{{ __('Estado') }}</label>
            <input type="text" name="estado" class="form-control @error('estado') is-invalid @enderror" value="{{ old('estado', $accesoRegistro?->estado) }}" id="estado" placeholder="Estado">
            {!! $errors->first('estado', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="proceso" class="form-label">{{ __('Proceso') }}</label>
            <input type="text" name="proceso" class="form-control @error('proceso') is-invalid @enderror" value="{{ old('proceso', $accesoRegistro?->proceso) }}" id="proceso" placeholder="Proceso">
            {!! $errors->first('proceso', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>