<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="id_curso" class="form-label">{{ __('Id Curso') }}</label>
            <input type="text" name="id_curso" class="form-control @error('id_curso') is-invalid @enderror" value="{{ old('id_curso', $yInscritosCurso?->id_curso) }}" id="id_curso" placeholder="Id Curso">
            {!! $errors->first('id_curso', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="id_usuario" class="form-label">{{ __('Id Usuario') }}</label>
            <input type="text" name="id_usuario" class="form-control @error('id_usuario') is-invalid @enderror" value="{{ old('id_usuario', $yInscritosCurso?->id_usuario) }}" id="id_usuario" placeholder="Id Usuario">
            {!! $errors->first('id_usuario', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="estado" class="form-label">{{ __('Estado') }}</label>
            <input type="text" name="estado" class="form-control @error('estado') is-invalid @enderror" value="{{ old('estado', $yInscritosCurso?->estado) }}" id="estado" placeholder="Estado">
            {!! $errors->first('estado', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fecha_reg" class="form-label">{{ __('Fecha Reg') }}</label>
            <input type="text" name="fecha_reg" class="form-control @error('fecha_reg') is-invalid @enderror" value="{{ old('fecha_reg', $yInscritosCurso?->fecha_reg) }}" id="fecha_reg" placeholder="Fecha Reg">
            {!! $errors->first('fecha_reg', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>