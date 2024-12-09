<?php

namespace App\Http\Controllers;

use App\Models\Concertacione;
use App\Models\FilesConcertacione;
use App\Models\GestionCurso;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ConcertacioneRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ConcertacioneController extends Controller
{

    public function index(): View
    {
        $concertaciones = DB::table('files_concertaciones')
            ->select(
                'gestion_cursos.Municipio_Curso',
                'files_concertaciones.id_file_concertaciones',
                'files_concertaciones.mes_concertacion',
                'files_concertaciones.ruta',
                'files_concertaciones.estado',
                'users.id',
                'users.nombres',
                'users.apellidos',
                'files_concertaciones.vigencia',
                'poa.Nombre_Poa'
            )
            ->join('users', 'users.id', '=', 'files_concertaciones.users_id')
            ->join('concertaciones', 'files_concertaciones.id_file_concertaciones', '=', 'concertaciones.id_concertacion')
            ->join('gestion_cursos', 'concertaciones.id_gestion_cursos', '=', 'gestion_cursos.id_Gestion_Cursos')
            ->join('poa', 'gestion_cursos.id_nombre_poa', '=', 'poa.id_poa')
            ->distinct()
            ->orderBy('files_concertaciones.id_file_concertaciones', 'DESC')
            ->get();

        // Obtener formaciones
        $formaciones = [];
        foreach ($concertaciones as $concertacion) {
            $formaciones[$concertacion->id_file_concertaciones] = DB::table('concertaciones')
                ->where('id_concertacion', $concertacion->id_file_concertaciones)
                ->count();
        }

        // Obtener cursos para cada concertación
        $cursosPorConcertacion = [];
        foreach ($concertaciones as $concertacion) {
            $cursosPorConcertacion[$concertacion->id_file_concertaciones] = DB::table('concertaciones')
                ->join('gestion_cursos', 'concertaciones.id_gestion_cursos', '=', 'gestion_cursos.id_Gestion_Cursos')
                ->where('concertaciones.id_concertacion', $concertacion->id_file_concertaciones)
                ->select('gestion_cursos.*')
                ->get();
        }

        return view('pages.actasConcertacion', compact('concertaciones', 'formaciones', 'cursosPorConcertacion'));
    }

    public function obtenerCursos($id)
    {
        try {
            $cursos = DB::table('concertaciones')
                ->join('gestion_cursos', 'concertaciones.id_gestion_cursos', '=', 'gestion_cursos.id_Gestion_Cursos')
                ->where('concertaciones.id_concertacion', $id)
                ->select(
                    'gestion_cursos.Municipio_Curso',
                    'gestion_cursos.Centro_Formacion',
                    'gestion_cursos.Nombre_Curso',
                    'gestion_cursos.Estado_Curso',
                    'gestion_cursos.Mes_Poa',
                    'gestion_cursos.categoria'
                )
                ->get();

            // Log para debugging
            Log::info('Cursos encontrados para concertación ' . $id . ':', ['cursos' => $cursos]);

            if ($cursos->isEmpty()) {
                return response()->json([
                    'success' => false,
                    'message' => 'No hay cursos asociados a esta concertación'
                ]);
            }

            return response()->json([
                'success' => true,
                'data' => $cursos
            ]);
        } catch (\Exception $e) {
            Log::error('Error al obtener cursos: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error al cargar los cursos: ' . $e->getMessage()
            ]);
        }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $concertacione = new Concertacione();

        return view('concertacione.create', compact('concertacione'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            // Validar la request
            $request->validate([
                'Mes_Poa' => 'required',
                'Vigencia' => 'required|numeric',
                'cursos' => 'required|array',
                'acta_concertacion' => 'required|file|mimes:pdf,doc,docx'
            ]);

            // Generar ID único para la concertación
            $idConcertacion = DB::table('files_concertaciones')->max('id_file_concertaciones') + 1;

            // Guardar el archivo
            $archivo = $request->file('acta_concertacion');
            $nombreArchivo = time() . '_' . $archivo->getClientOriginalName();
            $ruta = $archivo->storeAs('public/concertaciones', $nombreArchivo);

            // Guardar el registro en files_concertaciones
            DB::table('files_concertaciones')->insert([
                'id_file_concertaciones' => $idConcertacion,
                'mes_concertacion' => $request->Mes_Poa,
                'vigencia' => $request->Vigencia,
                'ruta' => $nombreArchivo,
                'users_id' => Auth::id(),
                'estado' => 'activo',
                'tipo' => 'concertacion'
            ]);

            // Guardar las concertaciones de cada curso
            foreach ($request->cursos as $cursoId) {
                DB::table('concertaciones')->insert([
                    'id_concertacion' => $idConcertacion,
                    'id_usuario' => Auth::id(),
                    'id_gestion_cursos' => $cursoId,
                    'fecha_registro' => now()
                ]);

                // Actualizar estado del curso
                DB::table('gestion_cursos')
                    ->where('id_Gestion_Cursos', $cursoId)
                    ->update(['Estado_Curso' => 'Concertado acta']);
            }

            DB::commit();
            return redirect()->back()->with('success', 'Concertación registrada exitosamente');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error en concertación: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'Error al registrar la concertación: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $concertacione = Concertacione::find($id);

        return view('concertacione.show', compact('concertacione'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $concertacione = Concertacione::find($id);

        return view('concertacione.edit', compact('concertacione'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ConcertacioneRequest $request, Concertacione $concertacione): RedirectResponse
    {
        $concertacione->update($request->validated());

        return Redirect::route('concertaciones.index')
            ->with('success', 'Concertacione updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Concertacione::find($id)->delete();

        return Redirect::route('concertaciones.index')
            ->with('success', 'Concertacione deleted successfully');
    }
}
