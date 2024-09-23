<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="id_file_concertaciones" class="form-label">{{ __('Id File Concertaciones') }}</label>
            <input type="text" name="id_file_concertaciones" class="form-control @error('id_file_concertaciones') is-invalid @enderror" value="{{ old('id_file_concertaciones', $filesConcertacione?->id_file_concertaciones) }}" id="id_file_concertaciones" placeholder="Id File Concertaciones">
            {!! $errors->first('id_file_concertaciones', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="mes_concertacion" class="form-label">{{ __('Mes Concertacion') }}</label>
            <input type="text" name="mes_concertacion" class="form-control @error('mes_concertacion') is-invalid @enderror" value="{{ old('mes_concertacion', $filesConcertacione?->mes_concertacion) }}" id="mes_concertacion" placeholder="Mes Concertacion">
            {!! $errors->first('mes_concertacion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="vigencia" class="form-label">{{ __('Vigencia') }}</label>
            <input type="text" name="vigencia" class="form-control @error('vigencia') is-invalid @enderror" value="{{ old('vigencia', $filesConcertacione?->vigencia) }}" id="vigencia" placeholder="Vigencia">
            {!! $errors->first('vigencia', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="ruta" class="form-label">{{ __('Ruta') }}</label>
            <input type="text" name="ruta" class="form-control @error('ruta') is-invalid @enderror" value="{{ old('ruta', $filesConcertacione?->ruta) }}" id="ruta" placeholder="Ruta">
            {!! $errors->first('ruta', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="users_id" class="form-label">{{ __('Users Id') }}</label>
            <input type="text" name="users_id" class="form-control @error('users_id') is-invalid @enderror" value="{{ old('users_id', $filesConcertacione?->users_id) }}" id="users_id" placeholder="Users Id">
            {!! $errors->first('users_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="estado" class="form-label">{{ __('Estado') }}</label>
            <input type="text" name="estado" class="form-control @error('estado') is-invalid @enderror" value="{{ old('estado', $filesConcertacione?->estado) }}" id="estado" placeholder="Estado">
            {!! $errors->first('estado', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="tipo" class="form-label">{{ __('Tipo') }}</label>
            <input type="text" name="tipo" class="form-control @error('tipo') is-invalid @enderror" value="{{ old('tipo', $filesConcertacione?->tipo) }}" id="tipo" placeholder="Tipo">
            {!! $errors->first('tipo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>