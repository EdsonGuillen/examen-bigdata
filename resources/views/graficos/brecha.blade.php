<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Brecha Salarial por Departamento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-light p-5">
    <div class="container">
        <h2 class="text-center mb-4">Brecha Salarial por Departamento</h2>
        <p class="text-center text-muted">Diferencia entre el salario más alto y más bajo en cada departamento</p>
        
        <div class="row">
            <!-- Gráfico principal -->
            <div class="col-md-8">
                <div class="card shadow mb-4">
                    <div class="card-header bg-danger text-white">
                        <h5 class="mb-0">📊 Comparación de Salarios</h5>
                    </div>
                    <div class="card-body">
                        <canvas id="graficoBrecha"></canvas>
                    </div>
                </div>
            </div>
            
            <!-- Tabla de datos -->
            <div class="col-md-4">
                <div class="card shadow mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">💰 Datos Detallados</h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
                            <table class="table table-sm table-striped mb-0">
                                <thead class="sticky-top bg-white">
                                    <tr>
                                        <th>Departamento</th>
                                        <th class="text-end">Brecha</th>
                                    </tr>
                                </thead>
                                <tbody>
    @foreach($datos as $item)
    <tr>
        <td class="small">{{ $item->dept_name }}</td>
        <td class="text-end small fw-bold text-danger">${{ number_format($item->brecha) }}</td>
    </tr>
    @endforeach
</tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Tarjetas informativas -->
        <h4 class="mt-4 mb-3">Detalle por Departamento</h4>
        <div class="row">
            @foreach($datos as $item)
            <div class="col-md-3 mb-3">
                <div class="card h-100 border-start border-danger border-4">
                    <div class="card-body">
                        <h6 class="card-title text-truncate fw-bold" title="{{ $item->dept_name }}">
    {{ $item->dept_name }}
</h6>
<p class="card-text text-danger fw-bold">
    Brecha: ${{ number_format($item->brecha) }}
</p>
                     <hr>
                       <p class="mb-1 small">
                            <span class="badge bg-success">Máximo</span>
                            <strong class="float-end">${{ number_format($item->sueldo_max) }}</strong>
                        </p>
                        <p class="mb-1 small">
                            <span class="badge bg-info">Mínimo</span>
                            <strong class="float-end">${{ number_format($item->sueldo_min) }}</strong>
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <!-- Botones de navegación -->
        <div class="mt-4 text-center">
            <a href="{{ url('/') }}" class="btn btn-secondary me-2">🏠 Inicio</a>
            <a href="{{ url('/graficos/genero') }}" class="btn btn-primary me-2">Gráfico Género</a>
            <a href="{{ url('/graficos/top-salarios') }}" class="btn btn-primary me-2">Top Salarios</a>
            <a href="{{ url('/graficos/promedios') }}" class="btn btn-primary">Promedio Salarios</a>
        </div>
    </div>

    <script>
        const datos = @json($datos);
        
        // Preparar datos para el gráfico
        const etiquetas = datos.map(item => item.dept_name);
        const maximos = datos.map(item => item.sueldo_max);
        const minimos = datos.map(item => item.sueldo_min);
        const brechas = datos.map(item => item.brecha);

        const ctx = document.getElementById('graficoBrecha').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: etiquetas,
                datasets: [
                    {
                        label: 'Salario Máximo ($)',
                        data: maximos,
                        backgroundColor: 'rgba(255, 99, 132, 0.7)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 2
                    },
                    {
                        label: 'Salario Mínimo ($)',
                        data: minimos,
                        backgroundColor: 'rgba(54, 162, 235, 0.7)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 2
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Salario ($)',
                            font: {
                                size: 14,
                                weight: 'bold'
                            }
                        },
                        ticks: {
                            callback: function(value) {
                                return '$' + value.toLocaleString();
                            }
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Departamento',
                            font: {
                                size: 14,
                                weight: 'bold'
                            }
                        },
                        ticks: {
                            maxRotation: 45,
                            minRotation: 45
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                        labels: {
                            font: {
                                size: 12,
                                weight: 'bold'
                            },
                            padding: 15
                        }
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return context.dataset.label + ': $' + context.parsed.y.toLocaleString();
                            }
                        },
                        backgroundColor: 'rgba(0, 0, 0, 0.8)',
                        titleFont: {
                            size: 14
                        },
                        bodyFont: {
                            size: 13
                        },
                        padding: 12
                    }
                }
            }
        });
    </script>
</body>
</html>
