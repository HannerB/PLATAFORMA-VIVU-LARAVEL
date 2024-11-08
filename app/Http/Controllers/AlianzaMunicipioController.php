<?php

namespace App\Http\Controllers;

use App\Models\AlianzaMunicipio;
use App\Models\User;
use App\Models\Poa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AlianzaMunicipioController extends Controller
{
    public function index()
    {
        // Obtener los POAs activos con sus relaciones usando query builder
        $poas = DB::table('poa')
            ->join('asignar_municipios', 'poa.id_asignar_municipios', '=', 'asignar_municipios.id')
            ->join('users', 'asignar_municipios.id_responsable', '=', 'users.id')
            ->where('asignar_municipios.estado', 'activo')
            ->select(
                'poa.*',
                'asignar_municipios.municipio as mun_nombre',
                'asignar_municipios.periodo',
                'users.nombres',
                'users.apellidos'
            )
            ->get();

        // Obtener alianzas con sus relaciones usando query builder
        $alianzas = DB::table('alianza_municipio')
            ->join('users', 'alianza_municipio.id_User', '=', 'users.id')
            ->select(
                'alianza_municipio.*',
                'users.nombres',
                'users.apellidos'
            )
            ->orderBy('alianza_municipio.id_alianza', 'DESC')
            ->get();

        return view('pages.asignarEnlaces', compact('poas', 'alianzas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'municipio' => 'required',
            'cedula' => 'required',
            'periodo' => 'required',
            'poblacion' => 'required',
            'cargo' => 'required',
            'poa' => 'required|exists:poa,id_poa'
        ]);

        try {
            // Primero buscar el usuario por documento
            $usuario = User::where('documento', $request->cedula)->first();

            if (!$usuario) {
                return redirect()->route('alianza-municipio.index')
                    ->with('error', 'No se encontró un usuario con ese número de documento');
            }

            // Crear el registro usando el ID del usuario encontrado
            AlianzaMunicipio::create([
                'id_User' => $usuario->id,  // Aquí usamos el ID del usuario en lugar de la cédula
                'municipio' => $request->municipio,
                'periodo' => $request->periodo,
                'enlace_poblacion' => $request->poblacion,
                'cargo' => $request->cargo,
                'estado' => 'activo',
                'poa_id' => $request->poa
            ]);

            return redirect()->route('alianza-municipio.index')
                ->with('success', 'Enlace asignado correctamente');
        } catch (\Exception $e) {
            return redirect()->route('alianza-municipio.index')
                ->with('error', 'Error al asignar enlace: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'estado' => 'required|in:activo,inactivo'
        ]);

        try {
            $alianza = AlianzaMunicipio::findOrFail($id);
            $alianza->estado = $request->estado;
            $alianza->save();

            return redirect()->route('alianza-municipio.index')
                ->with('success', 'Estado actualizado correctamente');
        } catch (\Exception $e) {
            return redirect()->route('alianza-municipio.index')
                ->with('error', 'Error al actualizar estado: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            AlianzaMunicipio::findOrFail($id)->delete();
            return redirect()->route('alianza-municipio.index')
                ->with('success', 'Enlace eliminado correctamente');
        } catch (\Exception $e) {
            return redirect()->route('alianza-municipio.index')
                ->with('error', 'Error al eliminar enlace: ' . $e->getMessage());
        }
    }

    public function buscarEnlace(Request $request)
    {
        $cedula = $request->cedula;

        $usuario = User::where('documento', $cedula)->first();

        if ($usuario) {
            return response()->json([
                'success' => true,
                'user' => $usuario
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Usuario no encontrado'
        ]);
    }
}
