<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte: Managers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-5">
    <div class="container">
        <h2 class="mb-4 text-center">Managers Actuales por Departamento</h2>
        <div class="card shadow">
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>Departamento</th>
                            <th>Nombre del Manager</th>
                            <th>Fecha de Inicio</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reporte as $fila)
                        <tr>
                            <td>{{ $fila->dept_name }}</td>
                            <td>{{ $fila->first_name }} {{ $fila->last_name }}</td>
                            <td>{{ $fila->from_date }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="mt-4 text-center">
            <a href="{{ url('/reportes/mejor-pagado') }}" class="btn btn-outline-primary">Ver Mejor Pagados</a>
        </div>
    </div>
</body>
</html>