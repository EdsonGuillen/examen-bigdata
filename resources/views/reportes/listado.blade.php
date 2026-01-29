<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Empleados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-5">
    <div class="container">
        <h2 class="text-center mb-4">Directorio de Empleados</h2>

        <form action="" method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" name="buscar" class="form-control" placeholder="Buscar por departamento (ej. Sales)...">
                <button type="submit" class="btn btn-primary">Buscar</button>
            </div>
        </form>

        <div class="card shadow">
            <div class="card-body">
                <table class="table table-hover">
                 <thead class="table-dark">
    <tr>
        <th>ID</th>
        <th>Nombre Completo</th>
        <th>Edad / Género</th>
        <th>Departamento</th>
        <th>Puesto (Título)</th>
        <th>Salario</th>
        <th>Contratado</th>
    </tr>
</thead>
<tbody>
    @foreach($empleados as $emp)
    <tr>
        <td>{{ $emp->emp_no }}</td>
        <td>{{ $emp->first_name }} {{ $emp->last_name }}</td>
        <td>
            {{ \Carbon\Carbon::parse($emp->birth_date)->age }} años <br>
            <small class="text-muted">{{ $emp->gender == 'M' ? 'Masculino' : 'Femenino' }}</small>
        </td>
        <td><span class="badge bg-info text-dark">{{ $emp->dept_name }}</span></td>
        <td>{{ $emp->title }}</td>
        <td class="text-success fw-bold">${{ number_format($emp->salary) }}</td>
        <td>{{ $emp->hire_date }}</td>
    </tr>
    @endforeach
</tbody>
                    </tbody>
                </table>

                <div class="d-flex justify-content-center mt-3">
                    {{ $empleados->appends(['buscar' => request('buscar')])->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</body>
</html>