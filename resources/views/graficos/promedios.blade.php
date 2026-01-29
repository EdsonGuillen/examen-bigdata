<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Promedio Salarial</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-light p-5">
    <div class="container">
        <h2 class="text-center mb-4">Promedio de Salarios por Departamento</h2>
        
        <div class="card shadow">
            <div class="card-body">
                <canvas id="miGrafico"></canvas>
            </div>
        </div>
        
        <div class="mt-4 text-center">
             <a href="{{ url('/reportes/estadisticas') }}" class="btn btn-outline-secondary">Ver Tabla de Datos</a>
        </div>
    </div>

    <script>
        const etiquetas = @json($etiquetas);
        const valores = @json($valores);

        const ctx = document.getElementById('miGrafico').getContext('2d');
        new Chart(ctx, {
            type: 'bar', // Barras verticales por defecto
            data: {
                labels: etiquetas,
                datasets: [{
                    label: 'Salario Promedio ($)',
                    data: valores,
                    backgroundColor: 'rgba(255, 159, 64, 0.6)', // Naranja
                    borderColor: 'rgba(255, 159, 64, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });
    </script>
</body>
</html>