<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="id_concertacion" class="form-label">{{ __('Id Concertacion') }}</label>
            <input type="text" name="id_concertacion" class="form-control @error('id_concertacion') is-invalid @enderror" value="{{ old('id_concertacion', $concertacione?->id_concertacion) }}" id="id_concertacion" placeholder="Id Concertacion">
            {!! $errors->first('id_concertacion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="id_usuario" class="form-label">{{ __('Id Usuario') }}</label>
            <input type="text" name="id_usuario" class="form-control @error('id_usuario') is-invalid @enderror" value="{{ old('id_usuario', $concertacione?->id_usuario) }}" id="id_usuario" placeholder="Id Usuario">
            {!! $errors->first('id_usuario', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="id_gestion_cursos" class="form-label">{{ __('Id Gestion Cursos') }}</label>
            <input type="text" name="id_gestion_cursos" class="form-control @error('id_gestion_cursos') is-invalid @enderror" value="{{ old('id_gestion_cursos', $concertacione?->id_gestion_cursos) }}" id="id_gestion_cursos" placeholder="Id Gestion Cursos">
            {!! $errors->first('id_gestion_cursos', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fecha_registro" class="form-label">{{ __('Fecha Registro') }}</label>
            <input type="text" name="fecha_registro" class="form-control @error('fecha_registro') is-invalid @enderror" value="{{ old('fecha_registro', $concertacione?->fecha_registro) }}" id="fecha_registro" placeholder="Fecha Registro">
            {!! $errors->first('fecha_registro', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>