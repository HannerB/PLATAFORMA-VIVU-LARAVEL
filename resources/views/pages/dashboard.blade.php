@extends('layouts.app')

@section('title', 'Dashboard | Oferta Complementaria')

@section('content')
    <div class="container">
        <div class="row mt-2">
            {{-- Gráfico 1 --}}
            <div class="col-md-3">
                <div class="card-deck">
                    <div class="card" style="width: 14.5rem;">
                        <img class="card-img-top img-fluid" src="{{ asset('assets/img/imgDashboard1.png') }}"
                            alt="Card image cap">
                        <div class="card-body" style="height: 9.5rem;">
                            <h5 class="card-title text-center container">Dashboard No. 1</h5>
                            <hr>
                            <p class="card-text text-center container">Grafico porcentual de los municipios que se les ha
                                brindado curso.</p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">
                                <a href="{{ route('dashboard.grafico-uno') }}" class="btn btn-outline-info btn-block">
                                    Ver gráfico
                                </a>
                            </small>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Gráfico 2 --}}
            <div class="col-md-3">
                <div class="card-deck">
                    <div class="card" style="width: 14.5rem;">
                        <img class="card-img-top img-fluid" src="{{ asset('assets/img/imgDashboard2.png') }}"
                            alt="Card image cap">
                        <div class="card-body" style="height: 9.5rem;">
                            <h5 class="card-title text-center container">Dashboard No. 2</h5>
                            <hr>
                            <p class="card-text text-center container">Grafico porcentual de géneros.</p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">
                                <button class="btn btn-outline-info btn-block"
                                    onclick="showChart('generos', {{ json_encode($dashboardData['grafico2']) }})">
                                    Ver gráfico
                                </button>
                            </small>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Gráfico 3 --}}
            <div class="col-md-3">
                <div class="card-deck">
                    <div class="card" style="width: 14.5rem;">
                        <img class="card-img-top img-fluid" src="{{ asset('assets/img/imgDashboard3.png') }}"
                            alt="Card image cap">
                        <div class="card-body" style="height: 9.5rem;">
                            <h5 class="card-title text-center container">Dashboard No. 3</h5>
                            <hr>
                            <p class="card-text text-center container">Grafico porcentual del tipo de población atendida.
                            </p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">
                                <button class="btn btn-outline-info btn-block"
                                    onclick="showChart('poblacion', {{ json_encode($dashboardData['grafico3']) }})">
                                    Ver gráfico
                                </button>
                            </small>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Gráfico 4 --}}
            <div class="col-md-3">
                <div class="card-deck">
                    <div class="card" style="width: 14.5rem;">
                        <img class="card-img-top img-fluid" src="{{ asset('assets/img/imgDashboard4.png') }}"
                            alt="Card image cap">
                        <div class="card-body" style="height: 9.5rem;">
                            <h5 class="card-title text-center container">Dashboard No. 4</h5>
                            <hr>
                            <p class="card-text text-center container">Grafico de los cursos solicitados.</p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">
                                <button class="btn btn-outline-info btn-block"
                                    onclick="showChart('cursos', {{ json_encode($dashboardData['grafico4']) }})">
                                    Ver gráfico
                                </button>
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal para gráficos --}}
    <div class="modal fade" id="chartModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Gráfico Estadístico</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <canvas id="chartCanvas"></canvas>
                </div>
            </div>
        </div>
    </div>
@endsection

@push
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        let currentChart = null;

        function showChart(type, data) {
            if (currentChart) {
                currentChart.destroy();
            }

            const ctx = document.getElementById('chartCanvas').getContext('2d');
            const chartConfig = getChartConfig(type, data);

            currentChart = new Chart(ctx, chartConfig);
            $('#chartModal').modal('show');
        }

        function getChartConfig(type, data) {
            const colors = [
                '#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF',
                '#FF9F40', '#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0'
            ];

            const configs = {
                municipios: {
                    type: 'pie',
                    data: {
                        labels: data.map(item => item.Municipio_Curso),
                        datasets: [{
                            data: data.map(item => item.total),
                            backgroundColor: colors
                        }]
                    }
                },
                generos: {
                    type: 'pie',
                    data: {
                        labels: data.map(item => item.sexo),
                        datasets: [{
                            data: data.map(item => item.total),
                            backgroundColor: colors
                        }]
                    }
                },
                poblacion: {
                    type: 'pie',
                    data: {
                        labels: data.map(item => item.tipoPoblacion),
                        datasets: [{
                            data: data.map(item => item.total),
                            backgroundColor: colors
                        }]
                    }
                },
                cursos: {
                    type: 'pie',
                    data: {
                        labels: data.map(item => item.nombreCursoSolicitado),
                        datasets: [{
                            data: data.map(item => item.total),
                            backgroundColor: colors
                        }]
                    }
                }
            };

            return configs[type];
        }
    </script>
@endpush
