@extends('layouts.app')

@section('title', 'Gestión de Cursos')

@section('content')
    <div class="container contenedor">
        {{-- Alertas --}}
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

        {{-- Botones de Control --}}
        <div class="mb-3">
            <button onclick="toggleForm()" class="btn btn-primary">
                <i class="fas fa-plus-circle"></i> Registrar Nuevo Curso
            </button>

            @if (Auth::user()->tieneAlianzaActiva())
                {{-- Si tiene alianza, mostrar información de la alianza y el botón de concertaciones --}}
                @php
                    $alianzaController = new App\Http\Controllers\AlianzaMunicipioController();
                    $alianzaInfo = $alianzaController->verificarEnlace(Auth::id());
                @endphp

                @if ($alianzaInfo['hasEnlace'])
                    <button class="btn btn-info ml-2" data-toggle="modal" data-target="#concertacionesModal">
                        <i class="fas fa-handshake"></i> Mis Concertaciones
                    </button>
                @endif
            @endif
        </div>

        {{-- Formulario de Registro --}}
        <div id="registroForm" class="card mb-4" style="display: none;">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0"><i class="fas fa-edit"></i> Registro de Nuevo Curso</h5>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('gestion-curso.store') }}" method="POST" id="cursoForm">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Centro_Formacion">Centro de Formación <span class="text-danger">*</span></label>
                                <select name="Centro_Formacion"
                                    class="form-control @error('Centro_Formacion') is-invalid @enderror" required>
                                    <option value="">Seleccione un centro...</option>
                                    <option value="CENTRO DE COMERCIO Y SERVICIOS">CENTRO DE COMERCIO Y SERVICIOS</option>
                                    <option value="CENTRO INDUSTRIAL Y DE AVIACION">CENTRO INDUSTRIAL Y DE AVIACIÓN</option>
                                    <option value="CENTRO NACIONAL COLOMBO ALEMAN">CENTRO NACIONAL COLOMBO ALEMÁN</option>
                                    <option value="CEDAGRO">CEDAGRO</option>
                                </select>
                                @error('Centro_Formacion')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Nivel_Formacion">Nivel de Formación <span class="text-danger">*</span></label>
                                <select name="Nivel_Formacion"
                                    class="form-control @error('Nivel_Formacion') is-invalid @enderror" required>
                                    <option value="">Seleccione un nivel...</option>
                                    <option value="Formacion Complementaria">Formación Complementaria</option>
                                    <option value="Formacion Titulada">Formación Titulada</option>
                                    <option value="Certificacion por competencias Laborales">Certificación por competencias
                                        Laborales</option>
                                    <option value="Evento divulgacion Tecnologica">Evento divulgación Tecnológica</option>
                                </select>
                                @error('Nivel_Formacion')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="Nombre_Curso">Nombre del Programa de Formación <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('Nombre_Curso') is-invalid @enderror"
                                    name="Nombre_Curso" required value="{{ old('Nombre_Curso') }}"
                                    placeholder="Ingrese el nombre del programa">
                                @error('Nombre_Curso')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="categoria">Categoría <span class="text-danger">*</span></label>
                                <select name="categoria" class="form-control @error('categoria') is-invalid @enderror"
                                    required>
                                    <option value="">Seleccione una categoría...</option>
                                    <option value="Tecnología">Tecnología</option>
                                    <option value="Salud Ocupacional">Salud Ocupacional</option>
                                    <option value="Contabilidad">Contabilidad</option>
                                    <option value="Emprendimiento">Emprendimiento</option>
                                    <option value="Cocina">Cocina</option>
                                    <option value="Confección">Confección</option>
                                    <option value="Construcción">Construcción</option>
                                    <option value="Artesanías">Artesanías</option>
                                    <option value="Agricultura">Agricultura</option>
                                    <option value="Pecuaria">Pecuaria</option>
                                </select>
                                @error('categoria')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Mes_Poa">Mes de ejecución <span class="text-danger">*</span></label>
                                <select name="Mes_Poa" class="form-control @error('Mes_Poa') is-invalid @enderror" required>
                                    <option value="">Seleccione un mes...</option>
                                    @foreach (['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'] as $mes)
                                        <option value="{{ $mes }}">{{ $mes }}</option>
                                    @endforeach
                                </select>
                                @error('Mes_Poa')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cupo">Cupo <span class="text-danger">*</span></label>
                                <input type="number" class="form-control @error('cupo') is-invalid @enderror"
                                    name="cupo" required value="{{ old('cupo', 25) }}" min="1">
                                @error('cupo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Direccion">Dirección</label>
                                <input type="text" class="form-control @error('Direccion') is-invalid @enderror"
                                    name="Direccion" value="{{ old('Direccion') }}"
                                    placeholder="Ingrese la dirección del curso">
                                @error('Direccion')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="id_nombre_poa" value="{{ $poa->id_poa }}">

                    <div class="text-right">
                        <button type="button" class="btn btn-secondary" onclick="toggleForm()">
                            <i class="fas fa-times"></i> Cancelar
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Registrar Curso
                        </button>
                    </div>
                </form>
            </div>
        </div>

        {{-- Tabla de Cursos --}}
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0"><i class="fas fa-list"></i> Listado de Cursos</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <input type="text" id="searchInput" class="form-control mb-3"
                        placeholder="Buscar en la tabla...">

                    <table id="cursosTable" class="table table-striped table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>Municipio</th>
                                <th>Centro Formación</th>
                                <th>Nivel</th>
                                <th>Nombre Curso</th>
                                <th>Categoría</th>
                                <th>Mes</th>
                                <th>Estado</th>
                                <th>Dirección</th>
                                <th>Cupo</th>
                                <th>Inscritos</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($consulta as $curso)
                                <tr>
                                    <td>{{ $curso->Municipio_Curso }}</td>
                                    <td>{{ $curso->Centro_Formacion }}</td>
                                    <td>{{ $curso->Nivel_Formacion }}</td>
                                    <td>{{ $curso->Nombre_Curso }}</td>
                                    <td>{{ $curso->categoria }}</td>
                                    <td>{{ $curso->Mes_Poa }}</td>
                                    <td>
                                        <span
                                            class="badge {{ $curso->Estado_Curso === 'Activo' ? 'badge-success' : 'badge-warning' }}">
                                            {{ $curso->Estado_Curso }}
                                        </span>
                                    </td>
                                    <td>{{ $curso->Direccion }}</td>
                                    <td>{{ $curso->cupo }}</td>
                                    <td>{{ $curso->inscritos_count }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-sm btn-primary" data-toggle="modal"
                                                data-target="#editModal{{ $curso->id_Gestion_Cursos }}">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-sm btn-danger" data-toggle="modal"
                                                data-target="#deleteModal{{ $curso->id_Gestion_Cursos }}">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                            <a href="{{ route('gestion-curso.cursos-detalle', $curso->id_Gestion_Cursos) }}"
                                                class="btn btn-sm btn-info">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="11" class="text-center">No hay cursos registrados</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @include('partials.modals.gestion_curso.gestion_curso_edit')
    @include('partials.modals.gestion_curso.gestion_curso_delete')
    @include('partials.modals.gestion_curso.concertaciones_modal')

@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .contenedor {
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .card {
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        }

        .close {
            outline: none !important;
        }

        .table th {
            background-color: #f8f9fa;
        }
    </style>
@endpush

@push('scripts')
    <script>
        function toggleForm() {
            const form = document.getElementById('registroForm');
            form.style.display = form.style.display === 'none' ? 'block' : 'none';
        }

        // Búsqueda en tabla
        document.getElementById('searchInput').addEventListener('keyup', function() {
            let searchText = this.value.toLowerCase();
            let table = document.getElementById('cursosTable');
            let rows = table.getElementsByTagName('tr');

            for (let row of rows) {
                if (row.getElementsByTagName('td').length) {
                    let found = false;
                    let cells = row.getElementsByTagName('td');

                    for (let cell of cells) {
                        if (cell.textContent.toLowerCase().indexOf(searchText) > -1) {
                            found = true;
                            break;
                        }
                    }

                    row.style.display = found ? '' : 'none';
                }
            }
        });

        // Validación del formulario
        document.getElementById('cursoForm').addEventListener('submit', function(e) {
            let camposRequeridos = ['Centro_Formacion', 'Nivel_Formacion', 'Nombre_Curso', 'categoria', 'Mes_Poa',
                'cupo'
            ];
            let valido = true;

            camposRequeridos.forEach(campo => {
                let input = document.querySelector(`[name="${campo}"]`);
                if (!input.value.trim()) {
                    input.classList.add('is-invalid');
                    valido = false;
                } else {
                    input.classList.remove('is-invalid');
                }
            });

            if (!valido) {
                e.preventDefault();
                alert('Por favor, complete todos los campos requeridos');
            }
        });
    </script>
@endpush
