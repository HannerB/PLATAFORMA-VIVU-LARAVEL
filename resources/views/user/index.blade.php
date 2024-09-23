@extends('layouts.app')

@section('template_title')
    Users
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Users') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
									<th >Tipodocumento</th>
									<th >Documento</th>
									<th >Fechanacimiento</th>
									<th >Telefono</th>
									<th >Tipopoblacion</th>
									<th >Centro</th>
									<th >Municipio</th>
									<th >Email</th>
									<th >Rol</th>
									<th >Fecharegistro</th>
									<th >Fecha Sesion</th>
									<th >Img</th>
									<th >Tipo Archivo</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $user->nombres }}</td>
										<td >{{ $user->apellidos }}</td>
										<td >{{ $user->sexo }}</td>
										<td >{{ $user->tipodocumento }}</td>
										<td >{{ $user->documento }}</td>
										<td >{{ $user->fechaNacimiento }}</td>
										<td >{{ $user->telefono }}</td>
										<td >{{ $user->tipoPoblacion }}</td>
										<td >{{ $user->centro }}</td>
										<td >{{ $user->municipio }}</td>
										<td >{{ $user->email }}</td>
										<td >{{ $user->rol }}</td>
										<td >{{ $user->fechaRegistro }}</td>
										<td >{{ $user->fecha_sesion }}</td>
										<td >{{ $user->img }}</td>
										<td >{{ $user->tipo_archivo }}</td>

                                            <td>
                                                <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('users.show', $user->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('users.edit', $user->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $users->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
