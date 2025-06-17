<?php

namespace App\Http\Controllers;

use App\Models\FilesConcertacione;
use App\Models\GestionCurso;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ValidacionActasController extends Controller
{
    public function validar(Request $request, $id)
    {
        $request->validate([
            'estado' => 'required|in:Acta valida,Acta No valida',
            'observaciones' => 'nullable|string'
        ]);

        DB::beginTransaction();
        try {
            $acta = FilesConcertacione::findOrFail($id);

            // Verificar permisos
            if (!auth()->user()->canValidateActas()) {
                abort(403, 'No tienes permisos para validar actas');
            }

            // Actualizar estado del acta
            $acta->estado = $request->estado;
            $acta->observaciones = $request->observaciones;
            $acta->fecha_validacion = now();
            $acta->validado_por = auth()->id();
            $acta->save();

            // Actualizar cursos según el estado
            $cursosIds = $acta->concertaciones->pluck('id_gestion_cursos');

            if ($request->estado === 'Acta valida') {
                GestionCurso::whereIn('id_Gestion_Cursos', $cursosIds)
                    ->update(['Estado_Curso' => 'Activo']);
            } else {
                GestionCurso::whereIn('id_Gestion_Cursos', $cursosIds)
                    ->update(['Estado_Curso' => 'registrado']);
            }

            DB::commit();

            return redirect()->back()->with('success', 'Acta validada correctamente');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Error al validar el acta: ' . $e->getMessage());
        }
    }

    public function descargar($id)
    {
        $acta = FilesConcertacione::findOrFail($id);

        // Verificar si puede ser descargada
        if (!$acta->puedeSerDescargada()) {
            abort(403, 'El acta debe estar validada para poder descargarla');
        }

        $rutaArchivo = storage_path('app/public/' . $acta->ruta);

        if (!file_exists($rutaArchivo)) {
            abort(404, 'Archivo no encontrado');
        }

        return response()->download($rutaArchivo);
    }

    public function verDetalle($id)
    {
        $acta = FilesConcertacione::with(['concertaciones.curso', 'usuario', 'validador'])
            ->findOrFail($id);

        $cursos = $acta->cursos()
            ->select('gestion_cursos.*')
            ->get();

        return response()->json([
            'success' => true,
            'acta' => $acta,
            'cursos' => $cursos
        ]);
    }
}
