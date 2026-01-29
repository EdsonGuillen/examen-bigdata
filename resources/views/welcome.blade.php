<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Examen Big Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h1 class="display-4 fw-bold">Panel de Control de RRHH</h1>
            <p class="lead">Sistema de Gestión de Empleados y Análisis de Datos</p>
        </div>

        <div class="row g-4">
            <div class="col-md-6">
                <div class="card h-100 bg-secondary text-white border-0 shadow">
                    <div class="card-header bg-primary fw-bold">📂 Reportes Tabulares</div>
                    <div class="card-body d-grid gap-3">
                        <a href="{{ url('/reportes/listado') }}" class="btn btn-light text-start">
                            👥 <b>Listado General</b> <small class="d-block text-muted">Buscador y paginación de empleados</small>
                        </a>
                        <a href="{{ url('/reportes/managers') }}" class="btn btn-light text-start">
                            👔 <b>Managers Actuales</b> <small class="d-block text-muted">Jefes de cada departamento</small>
                        </a>
                        <a href="{{ url('/reportes/mejor-pagado') }}" class="btn btn-light text-start">
                            💰 <b>Mejor Pagados</b> <small class="d-block text-muted">El sueldo más alto por área</small>
                        </a>
                        <a href="{{ url('/reportes/estadisticas') }}" class="btn btn-light text-start">
                            📊 <b>Estadísticas</b> <small class="d-block text-muted">Promedios y conteos por depto</small>
                        </a>
                        <a href="{{ url('/reportes/contratados') }}" class="btn btn-light text-start">
                            📅 <b>Contrataciones por Año</b> <small class="d-block text-muted">Histórico de ingresos</small>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card h-100 bg-secondary text-white border-0 shadow">
                    <div class="card-header bg-danger fw-bold">📈 Gráficos Visuales</div>
                    <div class="card-body d-grid gap-3">
                        <a href="{{ url('/graficos/genero') }}" class="btn btn-light text-start">
                            🥧 <b>Género (Pastel)</b> <small class="d-block text-muted">Distribución Hombres vs Mujeres</small>
                        </a>
                        <a href="{{ url('/graficos/top-salarios') }}" class="btn btn-light text-start">
                            🏆 <b>Top 10 Salarios (Barras)</b> <small class="d-block text-muted">Ranking de los más ricos</small>
                        </a>
                        <a href="{{ url('/graficos/promedios') }}" class="btn btn-light text-start">
                            📶 <b>Promedios (Barras)</b> <small class="d-block text-muted">Comparativa salarial por depto</small>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-5 text-muted">
            <small>Desarrollado para el Examen de Big Data con Laravel & MySQL</small>
        </div>
    </div>
</body>
</html>