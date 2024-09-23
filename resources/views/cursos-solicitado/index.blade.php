@extends('layouts.app')

@section('template_title')
    Cursos Solicitados
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Cursos Solicitados') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('cursos-solicitados.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
									<th >Telefono</th>
									<th >Correo</th>
									<th >Nombrecursosolicitado</th>
									<th >Fecharegistro</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cursosSolicitados as $cursosSolicitado)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $cursosSolicitado->nombres }}</td>
										<td >{{ $cursosSolicitado->apellidos }}</td>
										<td >{{ $cursosSolicitado->telefono }}</td>
										<td >{{ $cursosSolicitado->correo }}</td>
										<td >{{ $cursosSolicitado->nombreCursoSolicitado }}</td>
										<td >{{ $cursosSolicitado->fechaRegistro }}</td>

                                            <td>
                                                <form action="{{ route('cursos-solicitados.destroy', $cursosSolicitado->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('cursos-solicitados.show', $cursosSolicitado->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('cursos-solicitados.edit', $cursosSolicitado->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $cursosSolicitados->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
