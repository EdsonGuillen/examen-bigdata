<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
use App\Http\Controllers\ReportController;

Route::get('/reportes/mejor-pagado', [ReportController::class, 'mejorPagados']);
Route::get('/reportes/managers', [ReportController::class, 'managers']);
Route::get('/graficos/genero', [ReportController::class, 'graficoGenero']);
Route::get('/graficos/top-salarios', [ReportController::class, 'graficoTopSalarios']);
Route::get('/graficos/promedios', [ReportController::class, 'graficoPromedios']);
Route::get('/graficos/brecha-salarial', [ReportController::class, 'graficoBrechaSalarial']);
Route::get('/reportes/listado', [ReportController::class, 'listado']);
Route::get('/reportes/estadisticas', [ReportController::class, 'estadisticasDeptos']);
