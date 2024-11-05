<?php

namespace App\Http\Controllers;

use App\Models\AsignarMunicipio;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\AsignarMunicipioRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class AsignarMunicipioController extends Controller
{
    public function index()
    {
        $orientadores = User::where('rol', 3)->get();
        $asignaciones = AsignarMunicipio::with('user')
            ->whereHas('user', function ($query) {
                $query->where('rol', 3);
            })
            ->orderBy('id', 'DESC')
            ->get();

        return view('admin.asignar-municipio', compact('orientadores', 'asignaciones'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'municipio' => 'required',
            'id_responsable' => 'required|exists:users,id',
            'periodo' => 'required'
        ]);

        AsignarMunicipio::create([
            'municipio' => $request->municipio,
            'id_responsable' => $request->id_responsable,
            'periodo' => $request->periodo,
            'estado' => 'activo',
            'fecha_registro' => now()
        ]);

        return redirect()->route('asignar-municipio.index')
            ->with('success', 'Asignación creada exitosamente.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'municipio' => 'required',
            'periodo' => 'required',
            'estado' => 'required'
        ]);

        $asignacion = AsignarMunicipio::findOrFail($id);
        $asignacion->update([
            'municipio' => $request->municipio,
            'periodo' => $request->periodo,
            'estado' => $request->estado
        ]);

        return redirect()->route('asignar-municipio.index')
            ->with('success', 'Asignación actualizada exitosamente.');
    }

    public function destroy($id)
    {
        AsignarMunicipio::findOrFail($id)->delete();
        return redirect()->route('asignar-municipio.index')
            ->with('success', 'Asignación eliminada exitosamente.');
    }
}
