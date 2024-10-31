<?php

namespace App\Http\Controllers;

use App\Models\CursosDetalle;
use App\Models\GestionCurso;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\CursosDetalleRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class CursosDetalleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $cursosDetalles = CursosDetalle::paginate();

        return view('cursos-detalle.index', compact('cursosDetalles'))
            ->with('i', ($request->input('page', 1) - 1) * $cursosDetalles->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $cursosDetalle = new CursosDetalle();

        return view('cursos-detalle.create', compact('cursosDetalle'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CursosDetalleRequest $request): RedirectResponse
    {
        CursosDetalle::create($request->validated());

        return Redirect::route('cursos-detalles.index')
            ->with('success', 'CursosDetalle created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        // Obtener información del curso
        $curso = DB::table('gestion_cursos')
            ->join('poa', 'poa.id_poa', '=', 'gestion_cursos.id_nombre_poa')
            ->select('gestion_cursos.*', 'poa.Nombre_Poa')
            ->where('gestion_cursos.id_Gestion_Cursos', $id)
            ->first();

        // Obtener los detalles/inscritos del curso
        $inscritos = DB::table('cursos_detalle')
            ->join('users', 'users.id', '=', 'cursos_detalle.id_users')
            ->where('cursos_detalle.id_gestion_cursos', $id)
            ->select(
                'cursos_detalle.*',
                'users.nombres',
                'users.apellidos',
                'users.documento',
                'users.tipodocumento',
                'users.telefono',
                'users.email',
                'users.tipoPoblacion'
            )
            ->get();

        return view('poa.cursos-detalle.show_cursos', compact('curso', 'inscritos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $cursosDetalle = CursosDetalle::find($id);

        return view('cursos-detalle.edit', compact('cursosDetalle'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CursosDetalleRequest $request, CursosDetalle $cursosDetalle): RedirectResponse
    {
        $cursosDetalle->update($request->validated());

        return Redirect::route('cursos-detalles.index')
            ->with('success', 'CursosDetalle updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        return $this->eliminarInscrito($id);
    }

    public function eliminarInscrito($id): RedirectResponse
    {
        try {
            $cursosDetalle = CursosDetalle::findOrFail($id);
            $cursosDetalle->delete();

            return back()->with('success', 'Inscrito eliminado exitosamente.');
        } catch (\Exception $e) {
            Log::error('Error al eliminar inscrito: ' . $e->getMessage());
            return back()->with('error', 'No se pudo eliminar el inscrito.');
        }
    }
    public function cursosDetalle($id)
    {
        try {
            $gestionCurso = GestionCurso::findOrFail($id);

            $inscritos = DB::table('cursos_detalle')
                ->where('id_gestion_cursos', $id)
                ->join('users', 'cursos_detalle.id_users', '=', 'users.id')
                ->select(
                    'cursos_detalle.*',
                    'users.nombres',
                    'users.apellidos',
                    'users.documento',
                    'users.tipodocumento',
                    'users.telefono',
                    'users.tipoPoblacion'
                )
                ->get();

            return view('poa.cursos-detalle.curso_detalle', compact('gestionCurso', 'inscritos'));
        } catch (\Exception $e) {
            Log::error('Error en cursosDetalle: ' . $e->getMessage());
            Log::error($e->getTraceAsString());
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function cursosDetalle2($id)
    {
        try {
            $curso = GestionCurso::findOrFail($id);
            $inscritos = $curso->inscritos->count();
            $estadoCurso = $curso->Estado_Curso;

            return view('poa.cursos-detalle.curso_detalle2', compact('curso', 'inscritos', 'estadoCurso'));
        } catch (\Exception $e) {
            Log::error('Error en detalle: ' . $e->getMessage());
            Log::error($e->getTraceAsString());
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
}
