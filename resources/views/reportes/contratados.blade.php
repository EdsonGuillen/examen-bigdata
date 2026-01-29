<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Contrataciones por Año</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-5">
    <div class="container col-md-6">
        <h2 class="text-center mb-4">Empleados Contratados por Año</h2>
        <div class="card shadow">
            <div class="card-body">
                <table class="table table-striped text-center">
                    <thead class="table-dark">
                        <tr><th>Año</th><th>Total Contratados</th></tr>
                    </thead>
                    <tbody>
                        @foreach($reporte as $fila)
                        <tr>
                            <td class="fw-bold">{{ $fila->anio }}</td>
                            <td>{{ number_format($fila->total) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="mt-4 text-center"><a href="{{ url('/') }}" class="btn btn-secondary">Volver</a></div>
    </div>
</body>
</html>