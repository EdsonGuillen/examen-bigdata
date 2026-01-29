<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use Illuminate\View\View;          

class ReportController extends Controller
{
   public function mejorPagados(): View
{
    set_time_limit(300);    
// 1. Primero obtenemos la lista de departamentos
    $departamentos = DB::table('departments')->get();
    
    $reporte = [];

    // 2. Recorremos cada departamento buscando SU empleado mejor pagado
    foreach ($departamentos as $depto) {
        $ganador = DB::table('employees as e')
            ->join('dept_emp as de', 'e.emp_no', '=', 'de.emp_no')
            ->join('salaries as s', 'e.emp_no', '=', 's.emp_no')
            ->select('e.emp_no', 'e.first_name', 'e.last_name', 's.salary')
            ->where('de.dept_no', $depto->dept_no)    // Solo de este depto
            ->where('s.to_date', '9999-01-01')         // Sueldo actual
            ->orderBy('s.salary', 'desc')              // Ordenar del más rico al más pobre
            ->limit(1)                                 // ¡Tomar solo el primero!
            ->first();

        if ($ganador) {
            // Le pegamos el nombre del departamento al resultado
            $ganador->dept_name = $depto->dept_name;
            $reporte[] = $ganador;
        }
    }

    // 3. Enviamos la lista de ganadores a la vista (serán solo unos pocos registros)
    return view('reportes.mejor_pagado', compact('reporte'));
}// Reporte 1.1.2: Managers actuales
    public function managers(): View
    {
        $reporte = DB::table('dept_manager as dm')
            ->join('departments as d', 'dm.dept_no', '=', 'd.dept_no')
            ->join('employees as e', 'dm.emp_no', '=', 'e.emp_no')
            ->select('d.dept_name', 'e.first_name', 'e.last_name', 'dm.from_date')
            ->where('dm.to_date', '9999-01-01') // Solo los actuales
            ->orderBy('d.dept_name')
            ->get();

        return view('reportes.managers', compact('reporte'));
    }
    // Gráfico 2.1: Hombres vs Mujeres
    public function graficoGenero(): View
    {
        $datos = DB::table('employees')
            ->select('gender', DB::raw('count(*) as total'))
            ->groupBy('gender')
            ->get();

        // Preparamos los datos para Chart.js
        $etiquetas = $datos->pluck('gender'); // ['M', 'F']
        $valores = $datos->pluck('total');    // [179453, 120547]

        return view('graficos.genero', compact('etiquetas', 'valores'));
    }
    public function graficoTopSalarios(): View
    {
        // Obtenemos los 10 salarios más altos actuales
        $datos = DB::table('salaries as s')
            ->join('employees as e', 's.emp_no', '=', 'e.emp_no')
            ->select('e.first_name', 'e.last_name', 's.salary')
            ->where('s.to_date', '9999-01-01')
            ->orderBy('s.salary', 'desc')
            ->take(10)
            ->get();

        // Concatenamos nombre y apellido para la etiqueta
        $etiquetas = $datos->map(function ($item) {
            return $item->first_name . ' ' . $item->last_name;
        });
        
        $valores = $datos->pluck('salary');

        return view('graficos.top_salarios', compact('etiquetas', 'valores'));
    }
    public function graficoPromedios(): View
    {
        set_time_limit(300); 
        $datos = DB::table('departments as d')
            ->join('dept_emp as de', 'd.dept_no', '=', 'de.dept_no')
            ->join('salaries as s', 'de.emp_no', '=', 's.emp_no')
            ->select('d.dept_name', DB::raw('avg(s.salary) as promedio'))
            ->where('de.to_date', '9999-01-01')
            ->where('s.to_date', '9999-01-01')
            ->groupBy('d.dept_no', 'd.dept_name')
            ->get();

        // Separamos para Chart.js
        $etiquetas = $datos->pluck('dept_name');
        $valores = $datos->pluck('promedio');

        return view('graficos.promedios', compact('etiquetas', 'valores'));
    }
    public function listado(Request $request): View
    {
        // Capturamos lo que el usuario escribe en el buscador (si escribe algo)
        $busqueda = $request->get('buscar');

        $query = DB::table('employees as e')
            ->join('dept_emp as de', 'e.emp_no', '=', 'de.emp_no')
            ->join('departments as d', 'de.dept_no', '=', 'd.dept_no')
            ->select('e.emp_no', 'e.first_name', 'e.last_name', 'e.gender', 'd.dept_name')
            ->where('de.to_date', '9999-01-01'); // Solo asignación actual

        // Si el usuario escribió algo, filtramos
        if ($busqueda) {
            $query->where('d.dept_name', 'LIKE', '%' . $busqueda . '%');
        }

        $empleados = $query->paginate(15); // Paginación inteligente

        return view('reportes.listado', compact('empleados'));
    }
    // Reporte 1.1.5: Estadísticas por Departamento (La función perdida)
    public function estadisticasDeptos()
    {
        set_time_limit(300);
        $reporte = DB::table('departments as d')
            ->join('dept_emp as de', 'd.dept_no', '=', 'de.dept_no')
            ->join('salaries as s', 'de.emp_no', '=', 's.emp_no')
            ->select(
                'd.dept_name',
                DB::raw('count(de.emp_no) as total_empleados'),
                DB::raw('avg(s.salary) as salario_promedio')
            )
            ->where('de.to_date', '9999-01-01') // Asignación actual al depto
            ->where('s.to_date', '9999-01-01')  // Salario actual
            ->groupBy('d.dept_no', 'd.dept_name')
            ->get();

        return view('reportes.estadisticas', compact('reporte'));
    }}
