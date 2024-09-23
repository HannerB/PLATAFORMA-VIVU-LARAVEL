@extends('layouts.app')

@section('template_title')
    Cursos
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Cursos') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('cursos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
									<th >Codigo Curso</th>
									<th >Curso</th>
									<th >Jornada</th>
									<th >Horario</th>
									<th >Intensidad</th>
									<th >Fecha Inicio</th>
									<th >Municipio</th>
									<th >Direccion</th>
									<th >Formacion</th>
									<th >Centro</th>
									<th >Descripcion</th>
									<th >Nombre Grupo</th>
									<th >Estado</th>
									<th >Rol</th>
									<th >Fecharegistro</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cursos as $curso)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $curso->codigo_curso }}</td>
										<td >{{ $curso->curso }}</td>
										<td >{{ $curso->jornada }}</td>
										<td >{{ $curso->horario }}</td>
										<td >{{ $curso->intensidad }}</td>
										<td >{{ $curso->fecha_inicio }}</td>
										<td >{{ $curso->municipio }}</td>
										<td >{{ $curso->direccion }}</td>
										<td >{{ $curso->formacion }}</td>
										<td >{{ $curso->centro }}</td>
										<td >{{ $curso->descripcion }}</td>
										<td >{{ $curso->nombre_grupo }}</td>
										<td >{{ $curso->estado }}</td>
										<td >{{ $curso->rol }}</td>
										<td >{{ $curso->fechaRegistro }}</td>

                                            <td>
                                                <form action="{{ route('cursos.destroy', $curso->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('cursos.show', $curso->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('cursos.edit', $curso->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $cursos->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
