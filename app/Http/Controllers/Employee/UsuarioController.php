<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\usuario;
use Illuminate\Http\Request;

class usuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
                $usuarios = usuario::all();
        return view('usuarios.index',compact('usuarios'));
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
    public function show(usuariosEmployee $usuariosEmployee)
    {
        //
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
