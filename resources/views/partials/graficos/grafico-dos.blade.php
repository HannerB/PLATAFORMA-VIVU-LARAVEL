@extends('layouts.app')

@section('title', 'Gráfico Géneros | Oferta Complementaria')

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
                @foreach ($generosData as $row)
                    ["{{ $row->sexo }}", {{ $row->ContarSexo }}],
                @endforeach
            ]);

            var options = {
                title: 'GRÁFICO PORCENTUAL DE GÉNEROS',
                is3D: true,
                pieHole: 0.4,
                width: 1270,
                height: 580,
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
