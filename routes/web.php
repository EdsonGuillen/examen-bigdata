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