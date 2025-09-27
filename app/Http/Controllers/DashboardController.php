<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Programa;
use App\Models\Solicitud;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // 🔹 Conteos generales
        $totalUsuarios    = Usuario::count();
        $totalProgramas   = Programa::count();
        $totalSolicitudes = Solicitud::count();

        // 🔹 Últimas solicitudes (5 más recientes)
        $ultimasSolicitudes = Solicitud::with('programa')
            ->orderByDesc('FECHA_SOLICITUD')
            ->take(5)
            ->get();

        // 🔹 Solicitudes por mes (agrupadas por mes de FECHA_SOLICITUD)
        $solicitudesPorMes = Solicitud::selectRaw("
                MONTH(FECHA_SOLICITUD) as mes,
                COUNT(*) as total
            ")
            ->groupBy('mes')
            ->orderBy('mes')
            ->pluck('total', 'mes')
            // Opcional: convertir 1,2,3… a nombres de mes
            ->mapWithKeys(function ($value, $key) {
                $mesNombre = strftime('%B', mktime(0, 0, 0, $key, 1));
                return [ucfirst($mesNombre) => $value];
            });

        return view('dashboard', compact(
            'totalUsuarios',
            'totalProgramas',
            'totalSolicitudes',
            'ultimasSolicitudes',
            'solicitudesPorMes'
        ));
    }
}
