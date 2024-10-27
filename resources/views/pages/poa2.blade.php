@extends('layouts.app')

@section('content')
    <div class="container contenedor">
        @if (session('status'))
            <div class="alert alert-success alert-dismissible" style="margin-top:20px;">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <span class="icon-checkmark"></span> {{ session('status') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible" style="margin-top:20px;">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <span class="icon-checkmark"></span> Operacion NO Realizada: {{ session('error') }}
            </div>
        @endif

        <br>

        <style>
            /* Ajusta el tamaño del texto en la tabla */
            .tabla-detalles {
                font-size: 12px;
                /* Puedes ajustar el tamaño aquí */
            }

            /* Ajusta el tamaño de los botones */
            .btn-detalle {
                font-size: 10px;
                /* Puedes ajustar el tamaño del texto de los botones aquí */
                padding: 5px 10px;
                /* Ajusta el padding para cambiar el tamaño del botón */
            }
        </style>

        <div class="table-responsive">
            <table id="tabla" class="table table-striped tabla-detalles">
                <thead>
                    <tr>
                        <th style="width:80px">Nombre Poa</th>
                        <th style="width:80px">Municipio</th>
                        <th style="width:50px">Vigencia</th>
                        <th style="width:100px">Enlace</th>
                        <th style="width:50px">Telefono</th>
                        <th style="width:80px">Tipo Poblacion</th>
                        <th style="width:80px">Vocacion Productiva</th>
                        <th style="width:30px">Cursos</th>
                        <th style="width:280px">Gestion del Poa</th>
                    </tr>
                    <tr>
                        <td colspan="9">
                            <input id="buscar" type="text" class="form-control" placeholder="filtrar" />
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($poas as $poa)
                        <tr>
                            <td class="gfgnombres">{{ $poa->Nombre_Poa }}</td>
                            <td class="gfgmunicipio">{{ $poa->primer_municipio_curso }}</td>
                            <td class="gfgperiodo">{{ $poa->periodo_municipio }}</td>
                            <td class="gfgPersona_Enlace">{{ $poa->Persona_Enlace }}</td>
                            <td class="gfgTelefono_Enlace">{{ $poa->Telefono_Enlace }}</td>
                            <td class="gfgPoblacion">{{ $poa->Poblacion }}</td>
                            <td class="gfgOcupacion_Productiva">{{ $poa->Ocupacion_Productiva }}</td>
                            <td class="gfgcursos">{{ $poa->gestionCursos->count() }}</td>
                            <td class="gfgid" style="display:none">{{ $poa->id_poa }}</td>
                            <td>
                                @if (auth()->user()->alianza != 1)
                                    <button class="gfgselect btn btn-primary btn-xs btn-detalle" data-toggle="modal"
                                        data-target="#staticBackdrop">Editar</button>
                                    <button class="gfgdelete btn btn-danger btn-xs btn-detalle" data-toggle="modal"
                                        data-target="#staticBackdropDelete">Borrar</button>
                                @endif
                                <a href="{{ route('poa.Gestion_cursos2', $poa->id_poa) }}"
                                    class="btn btn-warning btn-xs btn-detalle">Ver Cursos</a>
                                <button class="gfgenlace btn btn-success btn-xs btn-detalle" data-toggle="modal"
                                    data-target="#staticBackdropenlace">Enlace</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @include('partials.modals.poa_edit')
    @include('partials.modals.poa_delete')
    @include('partials.modals.poa_enlace')
@endsection
