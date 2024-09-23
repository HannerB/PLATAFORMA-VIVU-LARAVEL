@extends('layouts.app')

@section('template_title')
    No Inscritos Sofiaplus
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('No Inscritos Sofiaplus') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('no-inscritos-sofiaplus.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
									<th >Id Sofiaplus</th>
									<th >Pais Nacimiento</th>
									<th >Departamento Nacimiento</th>
									<th >Municipio Nacimiento</th>
									<th >Fecha Exped Cedula</th>
									<th >Pais Cedula</th>
									<th >Departamento Cedula</th>
									<th >Municipio Cedula</th>
									<th >Id Users</th>
									<th >Registro Sofia</th>
									<th >Curso Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($noInscritosSofiaplus as $noInscritosSofiaplu)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $noInscritosSofiaplu->id_sofiaPlus }}</td>
										<td >{{ $noInscritosSofiaplu->pais_nacimiento }}</td>
										<td >{{ $noInscritosSofiaplu->departamento_nacimiento }}</td>
										<td >{{ $noInscritosSofiaplu->municipio_nacimiento }}</td>
										<td >{{ $noInscritosSofiaplu->fecha_exped_cedula }}</td>
										<td >{{ $noInscritosSofiaplu->pais_cedula }}</td>
										<td >{{ $noInscritosSofiaplu->departamento_cedula }}</td>
										<td >{{ $noInscritosSofiaplu->municipio_cedula }}</td>
										<td >{{ $noInscritosSofiaplu->id_users }}</td>
										<td >{{ $noInscritosSofiaplu->registro_sofia }}</td>
										<td >{{ $noInscritosSofiaplu->curso_id }}</td>

                                            <td>
                                                <form action="{{ route('no-inscritos-sofiaplus.destroy', $noInscritosSofiaplu->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('no-inscritos-sofiaplus.show', $noInscritosSofiaplu->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('no-inscritos-sofiaplus.edit', $noInscritosSofiaplu->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $noInscritosSofiaplus->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
