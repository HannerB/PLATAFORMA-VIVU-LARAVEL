<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="id_sofia_plus" class="form-label">{{ __('Id Sofiaplus') }}</label>
            <input type="text" name="id_sofiaPlus" class="form-control @error('id_sofiaPlus') is-invalid @enderror" value="{{ old('id_sofiaPlus', $noInscritosSofiaplu?->id_sofiaPlus) }}" id="id_sofia_plus" placeholder="Id Sofiaplus">
            {!! $errors->first('id_sofiaPlus', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="pais_nacimiento" class="form-label">{{ __('Pais Nacimiento') }}</label>
            <input type="text" name="pais_nacimiento" class="form-control @error('pais_nacimiento') is-invalid @enderror" value="{{ old('pais_nacimiento', $noInscritosSofiaplu?->pais_nacimiento) }}" id="pais_nacimiento" placeholder="Pais Nacimiento">
            {!! $errors->first('pais_nacimiento', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="departamento_nacimiento" class="form-label">{{ __('Departamento Nacimiento') }}</label>
            <input type="text" name="departamento_nacimiento" class="form-control @error('departamento_nacimiento') is-invalid @enderror" value="{{ old('departamento_nacimiento', $noInscritosSofiaplu?->departamento_nacimiento) }}" id="departamento_nacimiento" placeholder="Departamento Nacimiento">
            {!! $errors->first('departamento_nacimiento', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="municipio_nacimiento" class="form-label">{{ __('Municipio Nacimiento') }}</label>
            <input type="text" name="municipio_nacimiento" class="form-control @error('municipio_nacimiento') is-invalid @enderror" value="{{ old('municipio_nacimiento', $noInscritosSofiaplu?->municipio_nacimiento) }}" id="municipio_nacimiento" placeholder="Municipio Nacimiento">
            {!! $errors->first('municipio_nacimiento', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fecha_exped_cedula" class="form-label">{{ __('Fecha Exped Cedula') }}</label>
            <input type="text" name="fecha_exped_cedula" class="form-control @error('fecha_exped_cedula') is-invalid @enderror" value="{{ old('fecha_exped_cedula', $noInscritosSofiaplu?->fecha_exped_cedula) }}" id="fecha_exped_cedula" placeholder="Fecha Exped Cedula">
            {!! $errors->first('fecha_exped_cedula', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="pais_cedula" class="form-label">{{ __('Pais Cedula') }}</label>
            <input type="text" name="pais_cedula" class="form-control @error('pais_cedula') is-invalid @enderror" value="{{ old('pais_cedula', $noInscritosSofiaplu?->pais_cedula) }}" id="pais_cedula" placeholder="Pais Cedula">
            {!! $errors->first('pais_cedula', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="departamento_cedula" class="form-label">{{ __('Departamento Cedula') }}</label>
            <input type="text" name="departamento_cedula" class="form-control @error('departamento_cedula') is-invalid @enderror" value="{{ old('departamento_cedula', $noInscritosSofiaplu?->departamento_cedula) }}" id="departamento_cedula" placeholder="Departamento Cedula">
            {!! $errors->first('departamento_cedula', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="municipio_cedula" class="form-label">{{ __('Municipio Cedula') }}</label>
            <input type="text" name="municipio_cedula" class="form-control @error('municipio_cedula') is-invalid @enderror" value="{{ old('municipio_cedula', $noInscritosSofiaplu?->municipio_cedula) }}" id="municipio_cedula" placeholder="Municipio Cedula">
            {!! $errors->first('municipio_cedula', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="id_users" class="form-label">{{ __('Id Users') }}</label>
            <input type="text" name="id_users" class="form-control @error('id_users') is-invalid @enderror" value="{{ old('id_users', $noInscritosSofiaplu?->id_users) }}" id="id_users" placeholder="Id Users">
            {!! $errors->first('id_users', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="registro_sofia" class="form-label">{{ __('Registro Sofia') }}</label>
            <input type="text" name="registro_sofia" class="form-control @error('registro_sofia') is-invalid @enderror" value="{{ old('registro_sofia', $noInscritosSofiaplu?->registro_sofia) }}" id="registro_sofia" placeholder="Registro Sofia">
            {!! $errors->first('registro_sofia', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="curso_id" class="form-label">{{ __('Curso Id') }}</label>
            <input type="text" name="curso_id" class="form-control @error('curso_id') is-invalid @enderror" value="{{ old('curso_id', $noInscritosSofiaplu?->curso_id) }}" id="curso_id" placeholder="Curso Id">
            {!! $errors->first('curso_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>