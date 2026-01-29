<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Top 10 Salarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-light p-5">
    <div class="container">
        <h2 class="text-center mb-4">Top 10 Empleados Mejor Pagados</h2>
        
        <div class="card shadow">
            <div class="card-body">
                <canvas id="miGrafico"></canvas>
            </div>
        </div>
    </div>

    <script>
        const etiquetas = @json($etiquetas);
        const valores = @json($valores);

        const ctx = document.getElementById('miGrafico').getContext('2d');
        new Chart(ctx, {
            type: 'bar', // Tipo barra
            data: {
                labels: etiquetas,
                datasets: [{
                    label: 'Salario Anual ($)',
                    data: valores,
                    backgroundColor: 'rgba(75, 192, 192, 0.6)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                indexAxis: 'y', // <--- ESTO lo hace horizontal
                scales: {
                    x: { beginAtZero: false } // Para que se note mejor la diferencia
                }
            }
        });
    </script>
</body>
</html>