@extends('layouts.app')

@section('template_title')
    Alianza Municipios
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Alianza Municipios') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('alianza-municipios.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
									<th >Id Alianza</th>
									<th >Id User</th>
									<th >Municipio</th>
									<th >Periodo</th>
									<th >Enlace Poblacion</th>
									<th >Cargo</th>
									<th >Estado</th>
									<th >Poa Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($alianzaMunicipios as $alianzaMunicipio)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $alianzaMunicipio->id_alianza }}</td>
										<td >{{ $alianzaMunicipio->id_User }}</td>
										<td >{{ $alianzaMunicipio->municipio }}</td>
										<td >{{ $alianzaMunicipio->periodo }}</td>
										<td >{{ $alianzaMunicipio->enlace_poblacion }}</td>
										<td >{{ $alianzaMunicipio->cargo }}</td>
										<td >{{ $alianzaMunicipio->estado }}</td>
										<td >{{ $alianzaMunicipio->poa_id }}</td>

                                            <td>
                                                <form action="{{ route('alianza-municipios.destroy', $alianzaMunicipio->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('alianza-municipios.show', $alianzaMunicipio->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('alianza-municipios.edit', $alianzaMunicipio->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $alianzaMunicipios->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
