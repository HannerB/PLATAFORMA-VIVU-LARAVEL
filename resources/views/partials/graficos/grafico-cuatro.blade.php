@extends('layouts.app')

@section('title', 'Gráfico Cursos Solicitados | Oferta Complementaria')

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
        google.charts.load('current', {
            'packages': ['bar']
        });
        google.charts.setOnLoadCallback(drawStuff);

        function drawStuff() {
            var data = google.visualization.arrayToDataTable([
                ['Estado', 'Cantidad'],
                @foreach ($cursosData as $row)
                    ["{{ $row->nombreCursoSolicitado }}", {{ $row->NombreCurso }}],
                @endforeach
            ]);

            var options = {
                title: 'GRÁFICO CURSOS SOLICITADOS',
                width: 1100,
                height: 580,
                legend: {
                    position: 'none'
                },
                chart: {
                    title: 'GRÁFICO CURSOS SOLICITADOS'
                },
                bars: 'vertical', // Required for Material Bar Charts.
                axes: {
                    x: {
                        0: {
                            side: 'top',
                            label: 'Cantidad'
                        } // Top x-axis.
                    }
                },
                bar: {
                    groupWidth: "100%"
                },
                // Personalización adicional
                colors: ['#FF6C00'], // Color corporativo SENA
                backgroundColor: {
                    fill: 'white'
                },
                hAxis: {
                    textStyle: {
                        fontSize: 12,
                        fontName: 'Arial'
                    },
                    slantedText: true,
                    slantedTextAngle: 45
                },
                vAxis: {
                    textStyle: {
                        fontSize: 12,
                        fontName: 'Arial'
                    }
                }
            };

            var chart = new google.charts.Bar(document.getElementById('piechart_3d'));
            chart.draw(data, google.charts.Bar.convertOptions(options));

            // Hacer el gráfico responsive
            window.addEventListener('resize', function() {
                chart.draw(data, google.charts.Bar.convertOptions(options));
            });
        }
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

        /* Estilos adicionales para mejorar la visualización */
        #piechart_3d {
            margin-top: 20px;
            margin-bottom: 20px;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        /* Mejora la legibilidad de las etiquetas */
        .google-visualization-tooltip {
            background-color: rgba(255, 255, 255, 0.9) !important;
            padding: 8px !important;
            border: 1px solid #ddd !important;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2) !important;
        }
    </style>
@endsection
