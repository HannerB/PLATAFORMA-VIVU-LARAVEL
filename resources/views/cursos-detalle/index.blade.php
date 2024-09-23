@extends('layouts.app')

@section('template_title')
    Cursos Detalles
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Cursos Detalles') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('cursos-detalles.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
									<th >Id Cursos Detalle</th>
									<th >Id Users</th>
									<th >Id Gestion Cursos</th>
									<th >Fecha Registro</th>
									<th >Modo Documento</th>
									<th >Id Docuemnto</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cursosDetalles as $cursosDetalle)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $cursosDetalle->id_cursos_detalle }}</td>
										<td >{{ $cursosDetalle->id_users }}</td>
										<td >{{ $cursosDetalle->id_gestion_cursos }}</td>
										<td >{{ $cursosDetalle->fecha_registro }}</td>
										<td >{{ $cursosDetalle->modo_Documento }}</td>
										<td >{{ $cursosDetalle->id_Docuemnto }}</td>

                                            <td>
                                                <form action="{{ route('cursos-detalles.destroy', $cursosDetalle->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('cursos-detalles.show', $cursosDetalle->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('cursos-detalles.edit', $cursosDetalle->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $cursosDetalles->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
