<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="id__gestion__cursos" class="form-label">{{ __('Id Gestion Cursos') }}</label>
            <input type="text" name="id_Gestion_Cursos" class="form-control @error('id_Gestion_Cursos') is-invalid @enderror" value="{{ old('id_Gestion_Cursos', $gestionCurso?->id_Gestion_Cursos) }}" id="id__gestion__cursos" placeholder="Id Gestion Cursos">
            {!! $errors->first('id_Gestion_Cursos', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="municipio__curso" class="form-label">{{ __('Municipio Curso') }}</label>
            <input type="text" name="Municipio_Curso" class="form-control @error('Municipio_Curso') is-invalid @enderror" value="{{ old('Municipio_Curso', $gestionCurso?->Municipio_Curso) }}" id="municipio__curso" placeholder="Municipio Curso">
            {!! $errors->first('Municipio_Curso', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="centro__formacion" class="form-label">{{ __('Centro Formacion') }}</label>
            <input type="text" name="Centro_Formacion" class="form-control @error('Centro_Formacion') is-invalid @enderror" value="{{ old('Centro_Formacion', $gestionCurso?->Centro_Formacion) }}" id="centro__formacion" placeholder="Centro Formacion">
            {!! $errors->first('Centro_Formacion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="nivel__formacion" class="form-label">{{ __('Nivel Formacion') }}</label>
            <input type="text" name="Nivel_Formacion" class="form-control @error('Nivel_Formacion') is-invalid @enderror" value="{{ old('Nivel_Formacion', $gestionCurso?->Nivel_Formacion) }}" id="nivel__formacion" placeholder="Nivel Formacion">
            {!! $errors->first('Nivel_Formacion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="nombre__curso" class="form-label">{{ __('Nombre Curso') }}</label>
            <input type="text" name="Nombre_Curso" class="form-control @error('Nombre_Curso') is-invalid @enderror" value="{{ old('Nombre_Curso', $gestionCurso?->Nombre_Curso) }}" id="nombre__curso" placeholder="Nombre Curso">
            {!! $errors->first('Nombre_Curso', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="categoria" class="form-label">{{ __('Categoria') }}</label>
            <input type="text" name="categoria" class="form-control @error('categoria') is-invalid @enderror" value="{{ old('categoria', $gestionCurso?->categoria) }}" id="categoria" placeholder="Categoria">
            {!! $errors->first('categoria', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="mes__poa" class="form-label">{{ __('Mes Poa') }}</label>
            <input type="text" name="Mes_Poa" class="form-control @error('Mes_Poa') is-invalid @enderror" value="{{ old('Mes_Poa', $gestionCurso?->Mes_Poa) }}" id="mes__poa" placeholder="Mes Poa">
            {!! $errors->first('Mes_Poa', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="estado__curso" class="form-label">{{ __('Estado Curso') }}</label>
            <input type="text" name="Estado_Curso" class="form-control @error('Estado_Curso') is-invalid @enderror" value="{{ old('Estado_Curso', $gestionCurso?->Estado_Curso) }}" id="estado__curso" placeholder="Estado Curso">
            {!! $errors->first('Estado_Curso', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="jornada__curso" class="form-label">{{ __('Jornada Curso') }}</label>
            <input type="text" name="Jornada_Curso" class="form-control @error('Jornada_Curso') is-invalid @enderror" value="{{ old('Jornada_Curso', $gestionCurso?->Jornada_Curso) }}" id="jornada__curso" placeholder="Jornada Curso">
            {!! $errors->first('Jornada_Curso', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="direccion" class="form-label">{{ __('Direccion') }}</label>
            <input type="text" name="Direccion" class="form-control @error('Direccion') is-invalid @enderror" value="{{ old('Direccion', $gestionCurso?->Direccion) }}" id="direccion" placeholder="Direccion">
            {!! $errors->first('Direccion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="id_nombre_poa" class="form-label">{{ __('Id Nombre Poa') }}</label>
            <input type="text" name="id_nombre_poa" class="form-control @error('id_nombre_poa') is-invalid @enderror" value="{{ old('id_nombre_poa', $gestionCurso?->id_nombre_poa) }}" id="id_nombre_poa" placeholder="Id Nombre Poa">
            {!! $errors->first('id_nombre_poa', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fecha_registro" class="form-label">{{ __('Fecharegistro') }}</label>
            <input type="text" name="fechaRegistro" class="form-control @error('fechaRegistro') is-invalid @enderror" value="{{ old('fechaRegistro', $gestionCurso?->fechaRegistro) }}" id="fecha_registro" placeholder="Fecharegistro">
            {!! $errors->first('fechaRegistro', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="cupo" class="form-label">{{ __('Cupo') }}</label>
            <input type="text" name="cupo" class="form-control @error('cupo') is-invalid @enderror" value="{{ old('cupo', $gestionCurso?->cupo) }}" id="cupo" placeholder="Cupo">
            {!! $errors->first('cupo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>