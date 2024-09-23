<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="id_cursos_detalle" class="form-label">{{ __('Id Cursos Detalle') }}</label>
            <input type="text" name="id_cursos_detalle" class="form-control @error('id_cursos_detalle') is-invalid @enderror" value="{{ old('id_cursos_detalle', $cursosDetalle?->id_cursos_detalle) }}" id="id_cursos_detalle" placeholder="Id Cursos Detalle">
            {!! $errors->first('id_cursos_detalle', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="id_users" class="form-label">{{ __('Id Users') }}</label>
            <input type="text" name="id_users" class="form-control @error('id_users') is-invalid @enderror" value="{{ old('id_users', $cursosDetalle?->id_users) }}" id="id_users" placeholder="Id Users">
            {!! $errors->first('id_users', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="id_gestion_cursos" class="form-label">{{ __('Id Gestion Cursos') }}</label>
            <input type="text" name="id_gestion_cursos" class="form-control @error('id_gestion_cursos') is-invalid @enderror" value="{{ old('id_gestion_cursos', $cursosDetalle?->id_gestion_cursos) }}" id="id_gestion_cursos" placeholder="Id Gestion Cursos">
            {!! $errors->first('id_gestion_cursos', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fecha_registro" class="form-label">{{ __('Fecha Registro') }}</label>
            <input type="text" name="fecha_registro" class="form-control @error('fecha_registro') is-invalid @enderror" value="{{ old('fecha_registro', $cursosDetalle?->fecha_registro) }}" id="fecha_registro" placeholder="Fecha Registro">
            {!! $errors->first('fecha_registro', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="modo__documento" class="form-label">{{ __('Modo Documento') }}</label>
            <input type="text" name="modo_Documento" class="form-control @error('modo_Documento') is-invalid @enderror" value="{{ old('modo_Documento', $cursosDetalle?->modo_Documento) }}" id="modo__documento" placeholder="Modo Documento">
            {!! $errors->first('modo_Documento', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="id__docuemnto" class="form-label">{{ __('Id Docuemnto') }}</label>
            <input type="text" name="id_Docuemnto" class="form-control @error('id_Docuemnto') is-invalid @enderror" value="{{ old('id_Docuemnto', $cursosDetalle?->id_Docuemnto) }}" id="id__docuemnto" placeholder="Id Docuemnto">
            {!! $errors->first('id_Docuemnto', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>