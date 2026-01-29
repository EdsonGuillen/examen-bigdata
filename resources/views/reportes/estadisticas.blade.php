<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Estadísticas por Departamento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-5">
    <div class="container">
        <h2 class="text-center mb-4">Resumen por Departamento</h2>
        
        <div class="card shadow">
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>Departamento</th>
                            <th class="text-center">Total Empleados</th>
                            <th class="text-end">Salario Promedio</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reporte as $fila)
                        <tr>
                            <td>{{ $fila->dept_name }}</td>
                            <td class="text-center">{{ number_format($fila->total_empleados) }}</td>
                            <td class="text-end text-success fw-bold">${{ number_format($fila->salario_promedio, 2) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-4 text-center">
            <a href="{{ url('/graficos/promedios') }}" class="btn btn-primary">Ver en Gráfico</a>
            <a href="{{ url('/') }}" class="btn btn-secondary">Volver al Inicio</a>
        </div>
    </div>
</body>
</html>