<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Prestamos;
use App\Models\Libro;

class Reportes extends Controller
{

    public function clientesConLibrosVencidos()
    {
    $hoy = Carbon::today()->toDateString();

    $prestamosVencidos = Prestamos::with('cliente', 'libro')
        ->where('estado', '=', '0')
        ->whereRaw("DATE_ADD(fecha_prestamo, INTERVAL dias_prestamo DAY) < ?", [$hoy])
        ->get();

    return response()->json($prestamosVencidos);
    }
    public function prestamosPorMes()
    {
    $prestamosPorMes = Prestamos::select(
        DB::raw('YEAR(fecha_prestamo) as year'),
        DB::raw('MONTH(fecha_prestamo) as month'),
        DB::raw('count(*) as total')
    )
    ->groupBy('year', 'month')
    ->get();

    return response()->json($prestamosPorMes);
    }
    public function prestamosPorSemana()
    {
    $añoActual = now()->year;

    $prestamosPorSemana = Prestamos::select(
        DB::raw('YEAR(fecha_prestamo) as year'),
        DB::raw('WEEK(fecha_prestamo) as week'),
        DB::raw('count(*) as total')
    )
    ->groupBy('year', 'week')
    ->get();

    return response()->json($prestamosPorSemana);
    }


    public function librosPrestadosMesActual()
    {
    $inicioMes = now()->startOfMonth()->toDateString();
    $finMes = now()->endOfMonth()->toDateString();

    $prestamosMesActual = Prestamos::whereBetween('fecha_prestamo', [$inicioMes, $finMes])->with('libro')->get();

    return response()->json($prestamosMesActual);
    }

    public function librosPrestadosSemanaActual()
    {
    $inicioSemana = now()->startOfWeek()->toDateString();
    $finSemana = now()->endOfWeek()->toDateString();

    $prestamosSemanaActual = Prestamos::whereBetween('fecha_prestamo', [$inicioSemana, $finSemana])->with('libro')->get();
    return response()->json($prestamosSemanaActual);
    }

    public function totalLibros()
    {
    $totalLibros = Libro::count();

    return response()->json(['total_libros' => $totalLibros]);
    }




}
