<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Solicitud;
use App\Models\Programa;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSolicitudRequest;
use App\Http\Requests\UpdateSolicitudRequest;

class SolicitudController extends Controller
{
    public function index()
    {
        $solicitudes = Solicitud::with('programa')->get();
        return view('solicitud.index', compact('solicitudes'));
    }

    public function create()
    {
        $programas = Programa::all();
        return view('solicitud.create', compact('programas'));
    }

    public function store(StoreSolicitudRequest $request)
{
Solicitud::create([
    'NOMBRE'          => $request->NOMBRE,
    'ID_PROGRAMA'     => $request->ID_PROGRAMA, // 👈 IMPORTANTE
    'FECHA_SOLICITUD' => $request->FECHA_SOLICITUD,
    'ESTADO'          => $request->ESTADO,
]);

    return redirect()->route('solicitud.index')
                     ->with('success', 'Solicitud creada correctamente.');
}


    public function show($id)
    {
        $solicitud = Solicitud::with('programa')->findOrFail($id);
        return view('solicitud.show', compact('solicitud'));
    }

    public function edit(Solicitud $solicitud)
    {
        $programas = Programa::all();
        return view('solicitud.edit', compact('solicitud', 'programas'));
    }

    public function update(UpdateSolicitudRequest $request, Solicitud $solicitud)
    {
        $solicitud->update($request->validated());
        return redirect()->route('solicitud.index')
                         ->with('success', 'Solicitud actualizada correctamente.');
    }

    public function destroy(Solicitud $solicitud)
    {
        $solicitud->delete();
        return redirect()->route('solicitud.index')
                         ->with('success', 'Solicitud eliminada correctamente.');
    }
}
