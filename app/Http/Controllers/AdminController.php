<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminController extends Controller
{
    public function tablero()
    {
        return view('pages.tablero');
    }

    public function gestionUsuarios()
    {
        return view('admin.usuarios.search');
    }

    public function buscarUsuario(Request $request)
    {
        $usuario = User::where('documento', $request->cedula)->first();

        if (!$usuario) {
            return redirect()->route('admin.usuarios.gestionar')
                ->with('error', 'Usuario no encontrado');
        }

        return view('admin.usuarios.search', compact('usuario'));
    }

    public function actualizarUsuario(Request $request)
    {
        $request->validate([
            'txtNombres' => 'required',
            'txtApellidos' => 'required',
            'txtSexo' => 'required',
            'txtFechaNacimiento' => 'required|date',
            'txtCorreo' => 'required|email',
            'txtTipoDocumento' => 'required',
            'txtDocumento' => 'required',
            'txtTelefono' => 'required',
            'txtMunicipio' => 'required',
            'txtTipoPoblacion' => 'required',
            'rol' => 'required'
        ]);

        $usuario = User::findOrFail($request->id);

        $datosActualizar = [
            'nombres' => $request->txtNombres,
            'apellidos' => $request->txtApellidos,
            'sexo' => $request->txtSexo,
            'fechaNacimiento' => $request->txtFechaNacimiento,
            'email' => $request->txtCorreo,
            'tipodocumento' => $request->txtTipoDocumento,
            'documento' => $request->txtDocumento,
            'telefono' => $request->txtTelefono,
            'municipio' => $request->txtMunicipio,
            'tipoPoblacion' => $request->txtTipoPoblacion,
            'rol' => $request->rol
        ];

        if ($request->filled('txtPassword')) {
            $datosActualizar['password'] = Hash::make($request->txtPassword);
        }

        $usuario->update($datosActualizar);

        return redirect()->route('admin.usuarios.gestionar')->with('success', 'Usuario actualizado correctamente');
    }
}
