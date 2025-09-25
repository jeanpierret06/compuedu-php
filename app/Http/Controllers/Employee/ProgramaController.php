<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Programa;
use App\Http\Requests\StoreProgramaRequest;
use App\Http\Requests\UpdateProgramaRequest;

class ProgramaController extends Controller
{
    public function index()
    {
        $programas = Programa::all();
        return view('programa.index', compact('programas'));
    }

    public function create()
    {
        return view('programa.create');
    }

    public function store(StoreProgramaRequest $request)
    {
        Programa::create($request->validated());

        return redirect()->route('programa.index')
                         ->with('success', 'Programa creado correctamente.');
    }

    public function show(Programa $programa)
    {
        return view('programa.show', compact('programa'));
    }

    public function edit(Programa $programa)
    {
        return view('programa.edit', compact('programa'));
    }

    public function update(UpdateProgramaRequest $request, Programa $programa)
    {
        $programa->update($request->validated());

        return redirect()->route('programa.index')
                         ->with('success', 'Programa actualizado correctamente.');
    }

    public function destroy(Programa $programa)
    {
        try {
            $programa->delete();

            return redirect()->route('programa.index')
                             ->with('success', 'Programa eliminado correctamente.');
        } catch (\Throwable $e) {
            \Log::error("Error eliminando programa: " . $e->getMessage());

            return back()->withErrors('No se puede eliminar, tiene registros relacionados.');
        }
    }
}
