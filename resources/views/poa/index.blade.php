@extends('layouts.app')

@section('template_title')
    Poas
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Poas') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('poas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
									<th >Id Poa</th>
									<th >Id Asignar Municipios</th>
									<th >Nombre Poa</th>
									<th >Persona Enlace</th>
									<th >Telefono Enlace</th>
									<th >Correo Enlace</th>
									<th >Poblacion</th>
									<th >Ocupacion Productiva</th>
									<th >Fecha Registro</th>
									<th >Estado</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($poas as $poa)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $poa->id_poa }}</td>
										<td >{{ $poa->id_asignar_municipios }}</td>
										<td >{{ $poa->Nombre_Poa }}</td>
										<td >{{ $poa->Persona_Enlace }}</td>
										<td >{{ $poa->Telefono_Enlace }}</td>
										<td >{{ $poa->Correo_Enlace }}</td>
										<td >{{ $poa->Poblacion }}</td>
										<td >{{ $poa->Ocupacion_Productiva }}</td>
										<td >{{ $poa->fecha_registro }}</td>
										<td >{{ $poa->estado }}</td>

                                            <td>
                                                <form action="{{ route('poas.destroy', $poa->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('poas.show', $poa->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('poas.edit', $poa->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $poas->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
