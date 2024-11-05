@extends('layouts.app')

@section('title', 'Gráfico Población | Oferta Complementaria')

@section('content')
    <div class="container">
        <div class="row mt-2">
            <div class="col-md-12">
                <div id="piechart_3d" class="img-fluid"></div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load("current", {
            packages: ["corechart"]
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Estado', 'Contador'],
                @foreach ($poblacionData as $row)
                    ["{{ $row->tipoPoblacion }}", {{ $row->ContarPoblacion }}],
                @endforeach
            ]);

            var options = {
                title: 'GRÁFICO PORCENTUAL DEL TIPO DE POBLACIÓN ATENDIDA',
                is3D: true,
                pieHole: 0.4,
                width: 1270,
                height: 580,
                // Personalizar colores si lo deseas
                colors: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF',
                    '#FF9F40', '#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0'
                ],
                // Personalizar la leyenda
                legend: {
                    position: 'right',
                    alignment: 'center',
                    textStyle: {
                        fontSize: 12
                    }
                },
                // Personalizar el tooltip
                tooltip: {
                    showColorCode: true
                },
                // Personalizar el chart
                chartArea: {
                    left: 100,
                    top: 60,
                    width: '70%',
                    height: '70%'
                }
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
            chart.draw(data, options);
        }

        // Hacer el gráfico responsive
        window.addEventListener('resize', function() {
            drawChart();
        });
    </script>
@endsection

@section('styles')
    <style>
        .footer_new {
            bottom: 0;
            text-align: center;
            font-size: 15px;
            width: 100%;
            height: 50px;
            line-height: 44px;
            background-color: #FF6C00;
            color: white;
        }
    </style>
@endsection
