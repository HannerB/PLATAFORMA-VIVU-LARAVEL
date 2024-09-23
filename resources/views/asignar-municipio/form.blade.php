<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="municipio" class="form-label">{{ __('Municipio') }}</label>
            <input type="text" name="municipio" class="form-control @error('municipio') is-invalid @enderror" value="{{ old('municipio', $asignarMunicipio?->municipio) }}" id="municipio" placeholder="Municipio">
            {!! $errors->first('municipio', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="id_responsable" class="form-label">{{ __('Id Responsable') }}</label>
            <input type="text" name="id_responsable" class="form-control @error('id_responsable') is-invalid @enderror" value="{{ old('id_responsable', $asignarMunicipio?->id_responsable) }}" id="id_responsable" placeholder="Id Responsable">
            {!! $errors->first('id_responsable', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="periodo" class="form-label">{{ __('Periodo') }}</label>
            <input type="text" name="periodo" class="form-control @error('periodo') is-invalid @enderror" value="{{ old('periodo', $asignarMunicipio?->periodo) }}" id="periodo" placeholder="Periodo">
            {!! $errors->first('periodo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="estado" class="form-label">{{ __('Estado') }}</label>
            <input type="text" name="estado" class="form-control @error('estado') is-invalid @enderror" value="{{ old('estado', $asignarMunicipio?->estado) }}" id="estado" placeholder="Estado">
            {!! $errors->first('estado', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fecha_registro" class="form-label">{{ __('Fecha Registro') }}</label>
            <input type="text" name="fecha_registro" class="form-control @error('fecha_registro') is-invalid @enderror" value="{{ old('fecha_registro', $asignarMunicipio?->fecha_registro) }}" id="fecha_registro" placeholder="Fecha Registro">
            {!! $errors->first('fecha_registro', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>