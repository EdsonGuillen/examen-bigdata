<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gráfico de Género</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-light p-5">
    <div class="container">
        <h2 class="text-center mb-4">Distribución por Género</h2>
        
        <div class="card shadow col-md-6 mx-auto">
            <div class="card-body">
                <canvas id="miGrafico"></canvas>
            </div>
        </div>
        
        <div class="mt-4 text-center">
             <a href="{{ url('/reportes/managers') }}" class="btn btn-secondary">Ir a Managers</a>
        </div>
    </div>

    <script>
        // Recibimos los datos de PHP
        const etiquetas = @json($etiquetas);
        const valores = @json($valores);

        const ctx = document.getElementById('miGrafico').getContext('2d');
        new Chart(ctx, {
            type: 'pie', // Tipo de gráfico: Pastel
            data: {
                labels: etiquetas,
                datasets: [{
                    label: 'Total de Empleados',
                    data: valores,
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.7)', // Azul para uno
                        'rgba(255, 99, 132, 0.7)'  // Rojo para el otro
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 99, 132, 1)'
                    ],
                    borderWidth: 1
                }]
            }
        });
    </script>
</body>
</html>