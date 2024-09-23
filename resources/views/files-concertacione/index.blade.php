@extends('layouts.app')

@section('template_title')
    Files Concertaciones
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Files Concertaciones') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('files-concertaciones.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
									<th >Id File Concertaciones</th>
									<th >Mes Concertacion</th>
									<th >Vigencia</th>
									<th >Ruta</th>
									<th >Users Id</th>
									<th >Estado</th>
									<th >Tipo</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($filesConcertaciones as $filesConcertacione)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $filesConcertacione->id_file_concertaciones }}</td>
										<td >{{ $filesConcertacione->mes_concertacion }}</td>
										<td >{{ $filesConcertacione->vigencia }}</td>
										<td >{{ $filesConcertacione->ruta }}</td>
										<td >{{ $filesConcertacione->users_id }}</td>
										<td >{{ $filesConcertacione->estado }}</td>
										<td >{{ $filesConcertacione->tipo }}</td>

                                            <td>
                                                <form action="{{ route('files-concertaciones.destroy', $filesConcertacione->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('files-concertaciones.show', $filesConcertacione->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('files-concertaciones.edit', $filesConcertacione->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $filesConcertaciones->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
