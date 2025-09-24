<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Solicitud; // <-- CORRECCIÓN 2: Modelo importado
use Illuminate\Http\Request;

// CORRECCIÓN 1: El nombre de la clase ahora es "SolicitudController"
class SolicitudController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $solicitudes = solicitud::all();
        return view('solicitud.index',compact('solicitudes'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    // CORRECCIÓN 3: El método ahora recibe el $id de la solicitud
    public function show($id)
    {
        $solicitud = Solicitud::with(['programa', 'estudiantes', 'institucions'])
                                 ->findOrFail($id);

        return view('solicitud.show', compact('solicitud'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(usuariosEmployee $usuariosEmployee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, usuariosEmployee $usuariosEmployee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(usuariosEmployee $usuariosEmployee)
    {
        //
    }
}