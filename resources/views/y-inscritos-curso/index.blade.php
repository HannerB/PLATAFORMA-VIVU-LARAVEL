@extends('layouts.app')

@section('template_title')
    Y Inscritos Cursos
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Y Inscritos Cursos') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('y-inscritos-cursos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
									<th >Id Curso</th>
									<th >Id Usuario</th>
									<th >Estado</th>
									<th >Fecha Reg</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($yInscritosCursos as $yInscritosCurso)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $yInscritosCurso->id_curso }}</td>
										<td >{{ $yInscritosCurso->id_usuario }}</td>
										<td >{{ $yInscritosCurso->estado }}</td>
										<td >{{ $yInscritosCurso->fecha_reg }}</td>

                                            <td>
                                                <form action="{{ route('y-inscritos-cursos.destroy', $yInscritosCurso->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('y-inscritos-cursos.show', $yInscritosCurso->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('y-inscritos-cursos.edit', $yInscritosCurso->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $yInscritosCursos->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
