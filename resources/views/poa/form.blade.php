<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="id_poa" class="form-label">{{ __('Id Poa') }}</label>
            <input type="text" name="id_poa" class="form-control @error('id_poa') is-invalid @enderror" value="{{ old('id_poa', $poa?->id_poa) }}" id="id_poa" placeholder="Id Poa">
            {!! $errors->first('id_poa', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="id_asignar_municipios" class="form-label">{{ __('Id Asignar Municipios') }}</label>
            <input type="text" name="id_asignar_municipios" class="form-control @error('id_asignar_municipios') is-invalid @enderror" value="{{ old('id_asignar_municipios', $poa?->id_asignar_municipios) }}" id="id_asignar_municipios" placeholder="Id Asignar Municipios">
            {!! $errors->first('id_asignar_municipios', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="nombre__poa" class="form-label">{{ __('Nombre Poa') }}</label>
            <input type="text" name="Nombre_Poa" class="form-control @error('Nombre_Poa') is-invalid @enderror" value="{{ old('Nombre_Poa', $poa?->Nombre_Poa) }}" id="nombre__poa" placeholder="Nombre Poa">
            {!! $errors->first('Nombre_Poa', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="persona__enlace" class="form-label">{{ __('Persona Enlace') }}</label>
            <input type="text" name="Persona_Enlace" class="form-control @error('Persona_Enlace') is-invalid @enderror" value="{{ old('Persona_Enlace', $poa?->Persona_Enlace) }}" id="persona__enlace" placeholder="Persona Enlace">
            {!! $errors->first('Persona_Enlace', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="telefono__enlace" class="form-label">{{ __('Telefono Enlace') }}</label>
            <input type="text" name="Telefono_Enlace" class="form-control @error('Telefono_Enlace') is-invalid @enderror" value="{{ old('Telefono_Enlace', $poa?->Telefono_Enlace) }}" id="telefono__enlace" placeholder="Telefono Enlace">
            {!! $errors->first('Telefono_Enlace', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="correo__enlace" class="form-label">{{ __('Correo Enlace') }}</label>
            <input type="text" name="Correo_Enlace" class="form-control @error('Correo_Enlace') is-invalid @enderror" value="{{ old('Correo_Enlace', $poa?->Correo_Enlace) }}" id="correo__enlace" placeholder="Correo Enlace">
            {!! $errors->first('Correo_Enlace', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="poblacion" class="form-label">{{ __('Poblacion') }}</label>
            <input type="text" name="Poblacion" class="form-control @error('Poblacion') is-invalid @enderror" value="{{ old('Poblacion', $poa?->Poblacion) }}" id="poblacion" placeholder="Poblacion">
            {!! $errors->first('Poblacion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="ocupacion__productiva" class="form-label">{{ __('Ocupacion Productiva') }}</label>
            <input type="text" name="Ocupacion_Productiva" class="form-control @error('Ocupacion_Productiva') is-invalid @enderror" value="{{ old('Ocupacion_Productiva', $poa?->Ocupacion_Productiva) }}" id="ocupacion__productiva" placeholder="Ocupacion Productiva">
            {!! $errors->first('Ocupacion_Productiva', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fecha_registro" class="form-label">{{ __('Fecha Registro') }}</label>
            <input type="text" name="fecha_registro" class="form-control @error('fecha_registro') is-invalid @enderror" value="{{ old('fecha_registro', $poa?->fecha_registro) }}" id="fecha_registro" placeholder="Fecha Registro">
            {!! $errors->first('fecha_registro', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="estado" class="form-label">{{ __('Estado') }}</label>
            <input type="text" name="estado" class="form-control @error('estado') is-invalid @enderror" value="{{ old('estado', $poa?->estado) }}" id="estado" placeholder="Estado">
            {!! $errors->first('estado', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>