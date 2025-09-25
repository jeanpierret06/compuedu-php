<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Programa;
use App\Models\Solicitud;

class DashboardController extends Controller
{
    public function index()
    {
        // 🔹 Conteos
        $totalUsuarios = Usuario::count();
        $totalProgramas = Programa::count();
        $totalSolicitudes = Solicitud::count();

        // 🔹 Últimas solicitudes
        $ultimasSolicitudes = Solicitud::with('programa')
            ->latest('FECHA_SOLICITUD')
            ->take(5)
            ->get();

        // 🔹 Solicitudes por mes (últimos 6 meses)
        $solicitudesPorMes = Solicitud::selectRaw("MONTH(FECHA_SOLICITUD) as mes, COUNT(*) as total")
            ->groupBy('mes')
            ->orderBy('mes')
            ->pluck('total', 'mes');

        return view('dashboard', compact(
            'totalUsuarios',
            'totalProgramas',
            'totalSolicitudes',
            'ultimasSolicitudes',
            'solicitudesPorMes'
        ));
    }
}
