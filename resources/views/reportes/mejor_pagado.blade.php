<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-5">
    <h1>Mejor Pagado por Departamento</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Departamento</th>
                <th>Empleado</th>
                <th>Nombre</th>
                <th>Salario Máximo</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reporte as $fila)
            <tr>
                <td>{{ $fila->dept_name }}</td>
                <td>{{ $fila->emp_no }}</td>
                <td>{{ $fila->first_name }} {{ $fila->last_name }}</td>
                <td>${{ number_format($fila->salary, 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>