@extends('layouts.app')

@section('title', 'Asignar Enlaces')

@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <span class="icon-checkmark"></span> {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <span class="icon-checkmark"></span> Operación NO Realizada: {{ session('error') }}
        </div>
    @endif
    <div class="container mt-4">
        <!-- Formulario de registro -->
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Asignar Nuevo Enlace</h4>
                <form action="{{ route('alianza-municipio.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="municipio">Municipio</label>
                        <select name="municipio" id="municipio" class="form-select" required>
                            <option value="" disabled selected>Seleccione...</option>
                            @foreach (['BARANOA', 'BARRANQUILLA', 'CAMPO DE LA CRUZ', 'CANDELARIA', 'GALAPA', 'JUAN DE ACOSTA', 'LURUACO', 'MALAMBO', 'MANATÍ', 'PALMAR DE VARELA', 'PIOJO', 'POLONUEVO', 'PONEDERA', 'PUERTO COLOMBIA', 'REPELÓN', 'SABANAGRANDE', 'SABANALARGA', 'SANTA LUCÍA', 'SANTO TOMÁS', 'SOLEDAD', 'SUÁN', 'TUBARA', 'USIACURI'] as $municipio)
                                <option value="{{ $municipio }}">{{ $municipio }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mt-3">
                        <label for="cedula">Enlace</label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="cedula" name="cedula"
                                placeholder="Ingrese cédula del enlace" required>
                            <button class="btn btn-primary" type="button" onclick="buscarEnlace()">
                                Buscar
                            </button>
                        </div>
                        <div id="resultado" class="mt-2"></div>
                    </div>

                    <div class="form-group">
                        <label for="periodo">Periodo</label>
                        <select name="periodo" id="periodo" class="form-control" required>
                            <option value="" disabled selected>Seleccione el periodo...</option>
                            @php
                                $currentYear = date('Y');
                                for($i = $currentYear; $i >= $currentYear-2; $i--) {
                            @endphp
                                <option value="{{ $i }}">{{ $i }}</option>
                            @php
                                }
                            @endphp
                        </select>
                        <small class="form-text text-muted">Seleccione el año del periodo</small>
                    </div>

                    <div class="form-group mt-3">
                        <label for="poblacion">Enlace para el tipo de población</label>
                        <input type="text" class="form-control" id="poblacion" name="poblacion"
                            placeholder="Tipo población" required>
                    </div>

                    <div class="form-group mt-3">
                        <label for="cargo">Cargo o Rol</label>
                        <input type="text" class="form-control" id="cargo" name="cargo" placeholder="Cargo"
                            required>
                    </div>

                    <div class="form-group mt-3">
                        <label for="poa">POA</label>
                        <select class="form-control" name="poa" id="poa" required>
                            <option value="">Seleccione...</option>
                            @foreach ($poas as $poa)
                                <option value="{{ $poa->id_poa }}">
                                    {{ $poa->Nombre_Poa }} - Municipio de {{ $poa->mun_nombre }}
                                    - {{ $poa->periodo }} - {{ $poa->nombres }} {{ $poa->apellidos }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mt-4">
                        <button type="submit" class="btn btn-primary">Registrar</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Tabla de enlaces asignados -->
        <div class="card mt-4">
            <div class="card-body">
                <h4 class="card-title">Enlaces Asignados</h4>
                <div class="table-responsive">
                    <table id="tabla" class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nombres y Apellidos</th>
                                <th>Municipio</th>
                                <th>Vigencia</th>
                                <th>Atención a Población</th>
                                <th>Estado</th>
                                <th>Gestión</th>
                            </tr>
                            <tr>
                                <td colspan="6">
                                    <input id="buscar" type="text" class="form-control" placeholder="Filtrar">
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($alianzas as $alianza)
                                <tr>
                                    <td>{{ $alianza->nombres }} {{ $alianza->apellidos }}</td>
                                    <td>{{ $alianza->municipio }}</td>
                                    <td>{{ $alianza->periodo }}</td>
                                    <td>{{ $alianza->enlace_poblacion }}</td>
                                    <td>{{ $alianza->estado }}</td>
                                    <td>
                                        <button class="btn btn-primary btn-sm" data-toggle="modal"
                                            data-target="#editModal-{{ $alianza->id_alianza }}">
                                            Editar
                                        </button>
                                        <button class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#deleteModal-{{ $alianza->id_alianza }}">
                                            Borrar
                                        </button>
                                    </td>
                                </tr>
                                @include('partials.modals.enlaces.editarEnlace')
                                @include('partials.modals.enlaces.eliminarEnlace')
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            function buscarEnlace() {
                const cedula = document.getElementById('cedula').value;
                if (!cedula) {
                    alert('Por favor ingrese el nro de documento del enlace');
                    return;
                }

                fetch('/api/buscar-enlace', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        },
                        body: JSON.stringify({
                            cedula
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            document.getElementById('resultado').innerHTML = `
                    <div class="alert alert-success">
                        ${data.user.nombres} ${data.user.apellidos}
                    </div>`;
                        } else {
                            document.getElementById('resultado').innerHTML = `
                    <div class="alert alert-danger">
                        ${data.message}
                    </div>`;
                        }
                    });
            }

            // Función para filtrar la tabla
            const busqueda = document.getElementById('buscar');
            const table = document.getElementById("tabla").tBodies[0];

            busqueda.addEventListener('keyup', function() {
                const texto = busqueda.value.toLowerCase();
                let r = 0;
                while (row = table.rows[r++]) {
                    if (row.innerText.toLowerCase().indexOf(texto) !== -1)
                        row.style.display = null;
                    else
                        row.style.display = 'none';
                }
            });
        </script>
    @endpush
@endsection
