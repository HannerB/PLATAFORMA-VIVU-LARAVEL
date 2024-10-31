<?php

namespace App\Http\Controllers;

use App\Models\GestionCurso;
use App\Models\Poa;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\GestionCursoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class GestionCursoController extends Controller
{
    public function Gestion_cursos($id)
    {
        try {
            $consulta = GestionCurso::where('id_nombre_poa', $id)
                ->withCount('inscritos') // Esto añade inscritos_count
                ->orderBy('id_Gestion_Cursos', 'DESC')
                ->get();

            // Obtener conteo de inscritos para cada curso
            foreach ($consulta as $curso) {
                $curso->inscritos_count = DB::table('cursos_detalle')
                    ->where('id_gestion_cursos', $curso->id_Gestion_Cursos)
                    ->count();
            }

            $poa = Poa::findOrFail($id);

            $valores = $consulta->where('Estado_Curso', 'Concertado por validar')->count();

            return view('poa.gestion_cursos', compact('consulta', 'poa', 'valores'));
        } catch (\Exception $e) {
            Log::error('Error en gestionCursos: ' . $e->getMessage());
            Log::error($e->getTraceAsString());
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function actualizarCurso(Request $request, $id)
    {
        try {
            $gestionCurso = GestionCurso::findOrFail($id);

            $validated = $request->validate([
                'Centro_Formacion' => 'required',
                'Nivel_Formacion' => 'required',
                'Nombre_Curso' => 'required',
                'categoria' => 'required',
                'Mes_Poa' => 'required',
                'Estado_Curso' => 'required',
                'Direccion' => 'required',
                'cupo' => 'required|numeric'
            ]);

            $gestionCurso->update($validated);

            return redirect()->route('poa.gestion-cursos', $gestionCurso->id_nombre_poa)
                ->with('success', 'Curso actualizado exitosamente');
        } catch (\Exception $e) {
            Log::error('Error actualizando curso: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'Error al actualizar el curso: ' . $e->getMessage());
        }
    }

    public function eliminarCurso($id)
    {
        try {
            $gestionCurso = GestionCurso::findOrFail($id);
            $poaId = $gestionCurso->id_nombre_poa;

            $gestionCurso->delete();

            return redirect()->route('poa.gestion-cursos', $poaId)
                ->with('success', 'Curso eliminado exitosamente');
        } catch (\Exception $e) {
            Log::error('Error eliminando curso: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'Error al eliminar el curso: ' . $e->getMessage());
        }
    }

    public function index(Request $request): View
    {
        $gestionCursos = GestionCurso::paginate();

        return view('gestion-curso.index', compact('gestionCursos'))
            ->with('i', ($request->input('page', 1) - 1) * $gestionCursos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $gestionCurso = new GestionCurso();

        return view('gestion-curso.create', compact('gestionCurso'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GestionCursoRequest $request): RedirectResponse
    {
        GestionCurso::create($request->validated());

        return Redirect::route('gestion-cursos.index')
            ->with('success', 'GestionCurso created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $gestionCurso = GestionCurso::find($id);

        return view('gestion-curso.show', compact('gestionCurso'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $gestionCurso = GestionCurso::find($id);

        return view('gestion-curso.edit', compact('gestionCurso'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $gestionCurso = GestionCurso::findOrFail($id);

            $validated = $request->validate([
                'Centro_Formacion' => 'required',
                'Nivel_Formacion' => 'required',
                'Nombre_Curso' => 'required',
                'categoria' => 'required',
                'Mes_Poa' => 'required',
                'Estado_Curso' => 'required',
                'Direccion' => 'required',
                'cupo' => 'required|numeric'
            ]);

            $gestionCurso->update($validated);

            return redirect()->route('poa.Gestion_cursos2', $gestionCurso->id_nombre_poa)
                ->with('status', 'Curso actualizado exitosamente');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error al actualizar el curso: ' . $e->getMessage());
        }
    }

    public function Gestion_cursos2($id_poa)
    {
        try {
            $gestionCursos = GestionCurso::where('id_nombre_poa', $id_poa)->with('inscritos')->get();
            $poa = Poa::where('id_poa', $id_poa)->firstOrFail();
            return view('poa.Gestion_cursos2', compact('gestionCursos', 'poa'));
        } catch (\Exception $e) {
            Log::error('Error en Gestion_cursos2: ' . $e->getMessage());
            Log::error($e->getTraceAsString());
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        Log::info('Iniciando eliminación de curso: ' . $id);
        try {
            $curso = GestionCurso::findOrFail($id);
            Log::info('Curso encontrado: ', ['curso' => $curso->toArray()]);

            $id_poa = $curso->id_nombre_poa;
            $curso->delete();

            Log::info('Curso eliminado exitosamente');

            return redirect()->route('poa.Gestion_cursos2', $id_poa)
                ->with('status', 'Curso eliminado exitosamente');
        } catch (\Exception $e) {
            Log::error('Error en eliminación: ' . $e->getMessage());
            Log::error($e->getTraceAsString());
            return redirect()->back()
                ->with('error', 'Error al eliminar el curso: ' . $e->getMessage());
        }
    }

    public function getConcertaciones($id)
    {
        $gestionCurso = GestionCurso::with('concertaciones.user')->findOrFail($id);
        return response()->json($gestionCurso->concertaciones);
    }
}
