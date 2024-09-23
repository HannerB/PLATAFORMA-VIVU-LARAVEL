@extends('layouts.app')

@section('template_title')
    Gestion Cursos
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Gestion Cursos') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('gestion-cursos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
									<th >Id Gestion Cursos</th>
									<th >Municipio Curso</th>
									<th >Centro Formacion</th>
									<th >Nivel Formacion</th>
									<th >Nombre Curso</th>
									<th >Categoria</th>
									<th >Mes Poa</th>
									<th >Estado Curso</th>
									<th >Jornada Curso</th>
									<th >Direccion</th>
									<th >Id Nombre Poa</th>
									<th >Fecharegistro</th>
									<th >Cupo</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($gestionCursos as $gestionCurso)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $gestionCurso->id_Gestion_Cursos }}</td>
										<td >{{ $gestionCurso->Municipio_Curso }}</td>
										<td >{{ $gestionCurso->Centro_Formacion }}</td>
										<td >{{ $gestionCurso->Nivel_Formacion }}</td>
										<td >{{ $gestionCurso->Nombre_Curso }}</td>
										<td >{{ $gestionCurso->categoria }}</td>
										<td >{{ $gestionCurso->Mes_Poa }}</td>
										<td >{{ $gestionCurso->Estado_Curso }}</td>
										<td >{{ $gestionCurso->Jornada_Curso }}</td>
										<td >{{ $gestionCurso->Direccion }}</td>
										<td >{{ $gestionCurso->id_nombre_poa }}</td>
										<td >{{ $gestionCurso->fechaRegistro }}</td>
										<td >{{ $gestionCurso->cupo }}</td>

                                            <td>
                                                <form action="{{ route('gestion-cursos.destroy', $gestionCurso->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('gestion-cursos.show', $gestionCurso->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('gestion-cursos.edit', $gestionCurso->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $gestionCursos->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
