<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use App\Models\Rol;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::with('rol')->get(); // Carga el rol asociado
        return view('usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        $roles = Rol::all();
        return view('usuarios.create', compact('roles'));
    }

   public function store(Request $request)
{
    $request->validate([
        'NOMBRE_USUARIO'   => 'required|string|max:30',
        'APELLIDO_USUARIO' => 'required|string|max:45',
        'TELEFONO_USUARIO' => 'required|string|max:15',
        'EMAIL_USUARIO'    => 'required|email|max:45|unique:usuarios,EMAIL_USUARIO',
        'ROL_ID_USUA_ROL'  => 'nullable|exists:rol,ID_USUA_ROL', // 👈 ahora opcional
    ]);

    Usuario::create([
        'NOMBRE_USUARIO'   => $request->NOMBRE_USUARIO,
        'APELLIDO_USUARIO' => $request->APELLIDO_USUARIO,
        'TELEFONO_USUARIO' => $request->TELEFONO_USUARIO,
        'EMAIL_USUARIO'    => $request->EMAIL_USUARIO,
        'ROL_ID'  => $request->ROL_ID_USUA_ROL ?? 2, // 👈 si no hay rol, usa 2
    ]);

    return redirect()->route('usuario.index')
                     ->with('success', 'Usuario creado correctamente.');
}


    public function show(Usuario $usuario)
    {
        return view('usuario.show', compact('usuario'));
    }

    public function edit(Usuario $usuario)
    {
        $roles = Rol::all();
        return view('usuarios.edit', compact('usuario', 'roles'));
    }

    public function update(Request $request, Usuario $usuario)
    {
        $request->validate([
            'NOMBRE_USUARIO'   => 'required|string|max:30',
            'APELLIDO_USUARIO' => 'required|string|max:45',
            'TELEFONO_USUARIO' => 'required|string|max:15',
            'EMAIL_USUARIO'    => 'required|email|max:45|unique:usuarios,EMAIL_USUARIO,' . $usuario->ID_USUARIOS . ',ID_USUARIOS',
            'ROL_ID_USUA_ROL'  => 'required|exists:rol,ID_USUA_ROL',
        ]);

        $usuario->update($request->all());

        return redirect()->route('usuario.index')
                         ->with('success', 'Usuario actualizado correctamente.');
    }

    public function destroy(Usuario $usuario)
    {
        try {
            $usuario->delete();
            return redirect()->route('usuario.index')
                             ->with('success', 'Usuario eliminado correctamente.');
        } catch (\Throwable $e) {
            \Log::error("Error eliminando usuario: " . $e->getMessage());
            return back()->withErrors('No se puede eliminar este usuario porque tiene registros relacionados.');
        }
    }
}
