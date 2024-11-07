@extends('layouts.app')

@section('title', 'Tablero de Administración')

@section('content')
    <div class="dashboard-container">
        <div class="dashboard-header">
            <h1 class="dashboard-title">Panel de Administración</h1>
            <p class="dashboard-subtitle">Gestión y control del sistema</p>
        </div>

        <div class="dashboard-grid">
            <!-- Asignar Responsables -->
            <div class="dashboard-card">
                <div class="card-icon">
                    <i class="fa fa-users"></i>
                </div>
                <div class="card-content">
                    <h3>Asignar Responsables</h3>
                    <p>Orientadores responsables del POA en cada municipio</p>
                    <a href="{{ route('asignar-municipio.index') }}" class="card-button">
                        Gestionar
                        <i class="fa fa-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- Ver POA -->
            <div class="dashboard-card">
                <div class="card-icon">
                    <i class="fa fa-file-text"></i>
                </div>
                <div class="card-content">
                    <h3>Gestión POA</h3>
                    <p>Seguimiento y control de POA por municipio</p>
                    <a href="{{ route('poa') }}" class="card-button">
                        Gestionar
                        <i class="fa fa-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- Asignar Alianzas -->
            <div class="dashboard-card">
                <div class="card-icon">
                    <i class="fa fa-handshake-o"></i>
                </div>
                <div class="card-content">
                    <h3>Alianzas POA</h3>
                    <p>Gestión de enlaces y seguimiento de POA</p>
                    <a href="{{ route('alianza-municipio.index') }}" class="card-button">
                        Gestionar
                        <i class="fa fa-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- Actas de Concertación -->
            <div class="dashboard-card">
                <div class="card-icon">
                    <i class="fa fa-file-text-o"></i>
                </div>
                <div class="card-content">
                    <h3>Actas de Concertación</h3>
                    <p>Validación y activación de cursos</p>
                    <a href="{{ route('concertacione.index') }}" class="card-button">
                        Gestionar
                        <i class="fa fa-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- Gestión de usuarios -->
            <div class="dashboard-card">
                <div class="card-icon">
                    <i class="fa fa-users"></i>
                </div>
                <div class="card-content">
                    <h3>Gestión de Usuarios</h3>
                    <p>Administrar usuarios del sistema</p>
                    <a href="{{ route('admin.usuarios.gestionar') }}" class="card-button">
                        Gestionar
                        <i class="fa fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <style>
        .dashboard-container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1.5rem;
        }

        .dashboard-header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .dashboard-title {
            font-size: 2.5rem;
            color: #2c3e50;
            margin-bottom: 0.5rem;
        }

        .dashboard-subtitle {
            color: #7f8c8d;
            font-size: 1.1rem;
        }

        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
        }

        .dashboard-card {
            background: white;
            border-radius: 1rem;
            padding: 1.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.07);
            transition: all 0.3s ease;
            border: 1px solid #e1e1e1;
        }

        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
        }

        .card-icon {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
            background: linear-gradient(135deg, #00AF00 0%, #008000 100%);
        }

        .card-icon i {
            font-size: 1.5rem;
            color: white;
        }

        .card-content h3 {
            font-size: 1.25rem;
            color: #2c3e50;
            margin-bottom: 0.75rem;
        }

        .card-content p {
            color: #7f8c8d;
            font-size: 0.9rem;
            margin-bottom: 1.5rem;
            line-height: 1.5;
        }

        .card-button {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            background: linear-gradient(135deg, #00AF00 0%, #008000 100%);
            color: white;
            border-radius: 0.5rem;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .card-button:hover {
            background: linear-gradient(135deg, #008000 0%, #006400 100%);
            color: white;
            text-decoration: none;
        }

        @media (max-width: 768px) {
            .dashboard-grid {
                grid-template-columns: 1fr;
            }

            .dashboard-title {
                font-size: 2rem;
            }
        }
    </style>
@endsection
