@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-5">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Saturacion de Oxigeno</h3>
                </div>
                <div class="card-body">
                    <div class="chart">
                        <canvas id="saturacionOxigenoChart" style="height: 300px"></canvas>
                    </div>
                </div>
                <div class="card-footer"></div>
            </div>
        </div>

        <div class="col-md-5">
            <div class="card card-indigo card-outline">
                <div class="card-header">
                    <h3 class="card-title">Frecuencia Cardíaca</h3>
                </div>
                <div class="card-body">
                    <div class="chart">
                        <canvas id="frecuenciaCardiacaChart" style="height: 300px"></canvas>
                    </div>
                </div>
                <div class="card-footer"></div>
            </div>
        </div>
    </div>

@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    {{-- Add here extra scripts --}}
    {{-- Importar la librería de Chart.js --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>

    <script>
        // Definir la clase ChartUpdater primero
        class ChartUpdater {
            updateChart(url, chart) {
                $.get(url, function(data) {
                    chart.data.labels = data.labels;
                    chart.data.datasets[0].data = data.data;
                    chart.update();
                });
            }
        }

        $(function() {
            var saturacionOxigenoChartCanvas = $('#saturacionOxigenoChart').get(0).getContext('2d');
            var frecuenciaCardiacaChartCanvas = $('#frecuenciaCardiacaChart').get(0).getContext('2d');

            var saturacionOxigenoChart = createChart(saturacionOxigenoChartCanvas, 'Saturacion de Oxigeno');
            var frecuenciaCardiacaChart = createChart(frecuenciaCardiacaChartCanvas, 'Frecuencia Cardiaca');

            var chartUpdater = new ChartUpdater();

            chartUpdater.updateChart('/api/saturacion-oxigeno', saturacionOxigenoChart);
            chartUpdater.updateChart('/api/frecuencia-cardiaca', frecuenciaCardiacaChart);

            setInterval(() => chartUpdater.updateChart('/api/saturacion-oxigeno', saturacionOxigenoChart), 2000);
            setInterval(() => chartUpdater.updateChart('/api/frecuencia-cardiaca', frecuenciaCardiacaChart), 2000);

            function createChart(canvas, label) {
                return new Chart(canvas, {
                    type: 'line',
                    data: {
                        labels: [],
                        datasets: [{
                            label: label,
                            fill: false,
                            // tension: 0.1,
                            backgroundColor: 'rgba(60,141,188,0.9)',
                            borderColor: 'rgba(60,141,188,0.8)',
                            // pointRadius: false,
                            pointColor: '#3b8bba',
                            pointStrokeColor: 'rgba(60,141,188,1)',
                            pointHighlightFill: '#fff',
                            pointHighlightStroke: 'rgba(60,141,188,1)',
                            data: []
                        }]
                    },
                    options: {
                        maintainAspectRatio: false,
                        responsive: true,
                        legend: {
                            display: false
                        },
                        scales: {
                            xAxes: [{
                                gridLines: {
                                    display: true,
                                }
                            }],
                            yAxes: [{
                                gridLines: {
                                    display: true,
                                }
                            }]
                        }
                    }
                });
            }
        });
    </script>
@stop
