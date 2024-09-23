@extends('layouts.app')

@section('template_title')
    Competencias
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Competencias') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('competencias.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
									<th >Nombres</th>
									<th >Apellidos</th>
									<th >Sexo</th>
									<th >Correo</th>
									<th >Tipodocumento</th>
									<th >Documento</th>
									<th >Fechanacimiento</th>
									<th >Municipio</th>
									<th >Telefono</th>
									<th >Poblacion</th>
									<th >Ocupacion</th>
									<th >Fecharegistro</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($competencias as $competencia)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $competencia->nombres }}</td>
										<td >{{ $competencia->apellidos }}</td>
										<td >{{ $competencia->sexo }}</td>
										<td >{{ $competencia->correo }}</td>
										<td >{{ $competencia->tipodocumento }}</td>
										<td >{{ $competencia->documento }}</td>
										<td >{{ $competencia->fechaNacimiento }}</td>
										<td >{{ $competencia->municipio }}</td>
										<td >{{ $competencia->telefono }}</td>
										<td >{{ $competencia->poblacion }}</td>
										<td >{{ $competencia->ocupacion }}</td>
										<td >{{ $competencia->fechaRegistro }}</td>

                                            <td>
                                                <form action="{{ route('competencias.destroy', $competencia->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('competencias.show', $competencia->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('competencias.edit', $competencia->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $competencias->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
