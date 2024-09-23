@extends('layouts.app')

@section('template_title')
    Emprendimientos
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Emprendimientos') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('emprendimientos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
									<th >Regional</th>
									<th >Centroformacion</th>
									<th >Codigoproyecto</th>
									<th >Nombrespersonal</th>
									<th >Apellidospersonal</th>
									<th >Documentopersonal</th>
									<th >Fechanacimiento</th>
									<th >Ciudadnacimiento</th>
									<th >Departamentonacimiento</th>
									<th >Correopersonal</th>
									<th >Genero</th>
									<th >Telefonooficinapersonal</th>
									<th >Telefonomovilpersonal</th>
									<th >Direccionresidencia</th>
									<th >Ciudadresidencia</th>
									<th >Departamentoresidencia</th>
									<th >Tipopoblacionpersonal</th>
									<th >Formacionacademica</th>
									<th >Programaformacion</th>
									<th >Institucionacademica</th>
									<th >Estadoacademica</th>
									<th >Serviciorequerido</th>
									<th >Nombreempresa</th>
									<th >Nitempresa</th>
									<th >Estatusempresa</th>
									<th >Fechaconstitucionempresa</th>
									<th >Representanteempresa</th>
									<th >Tamanoempresa</th>
									<th >Actividadeconomicaempresa</th>
									<th >Sectoreconomicoempresa</th>
									<th >Tiposociedadempresa</th>
									<th >Direccionempresa</th>
									<th >Paginawebempresa</th>
									<th >Ciudadempresa</th>
									<th >Departamentoempresa</th>
									<th >Correoempresa</th>
									<th >Empleadosformales</th>
									<th >Empleadosinformales</th>
									<th >Descripcionproductosempresa</th>
									<th >Internetempresa</th>
									<th >Negocioencasa</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($emprendimientos as $emprendimiento)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $emprendimiento->regional }}</td>
										<td >{{ $emprendimiento->centroFormacion }}</td>
										<td >{{ $emprendimiento->codigoProyecto }}</td>
										<td >{{ $emprendimiento->nombresPersonal }}</td>
										<td >{{ $emprendimiento->apellidosPersonal }}</td>
										<td >{{ $emprendimiento->documentoPersonal }}</td>
										<td >{{ $emprendimiento->fechaNacimiento }}</td>
										<td >{{ $emprendimiento->ciudadNacimiento }}</td>
										<td >{{ $emprendimiento->departamentoNacimiento }}</td>
										<td >{{ $emprendimiento->correoPersonal }}</td>
										<td >{{ $emprendimiento->genero }}</td>
										<td >{{ $emprendimiento->telefonoOficinaPersonal }}</td>
										<td >{{ $emprendimiento->telefonoMovilPersonal }}</td>
										<td >{{ $emprendimiento->direccionResidencia }}</td>
										<td >{{ $emprendimiento->ciudadResidencia }}</td>
										<td >{{ $emprendimiento->departamentoResidencia }}</td>
										<td >{{ $emprendimiento->tipoPoblacionPersonal }}</td>
										<td >{{ $emprendimiento->formacionAcademica }}</td>
										<td >{{ $emprendimiento->programaFormacion }}</td>
										<td >{{ $emprendimiento->institucionAcademica }}</td>
										<td >{{ $emprendimiento->estadoAcademica }}</td>
										<td >{{ $emprendimiento->servicioRequerido }}</td>
										<td >{{ $emprendimiento->nombreEmpresa }}</td>
										<td >{{ $emprendimiento->nitEmpresa }}</td>
										<td >{{ $emprendimiento->estatusEmpresa }}</td>
										<td >{{ $emprendimiento->fechaConstitucionEmpresa }}</td>
										<td >{{ $emprendimiento->representanteEmpresa }}</td>
										<td >{{ $emprendimiento->tamanoEmpresa }}</td>
										<td >{{ $emprendimiento->actividadEconomicaEmpresa }}</td>
										<td >{{ $emprendimiento->sectorEconomicoEmpresa }}</td>
										<td >{{ $emprendimiento->tipoSociedadEmpresa }}</td>
										<td >{{ $emprendimiento->direccionEmpresa }}</td>
										<td >{{ $emprendimiento->paginaWebEmpresa }}</td>
										<td >{{ $emprendimiento->ciudadEmpresa }}</td>
										<td >{{ $emprendimiento->departamentoEmpresa }}</td>
										<td >{{ $emprendimiento->correoEmpresa }}</td>
										<td >{{ $emprendimiento->empleadosFormales }}</td>
										<td >{{ $emprendimiento->empleadosInformales }}</td>
										<td >{{ $emprendimiento->descripcionProductosEmpresa }}</td>
										<td >{{ $emprendimiento->internetEmpresa }}</td>
										<td >{{ $emprendimiento->negocioEnCasa }}</td>

                                            <td>
                                                <form action="{{ route('emprendimientos.destroy', $emprendimiento->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('emprendimientos.show', $emprendimiento->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('emprendimientos.edit', $emprendimiento->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $emprendimientos->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
