<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\YInscritosCurso;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\CursoRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $query = Curso::query();

        // Filtrar por municipio
        if ($request->filled('municipio')) {
            $query->where('municipio', $request->municipio);
        }

        // Filtrar por estado activo por defecto
        $query->where('estado', 'Activo');

        // Obtener cursos con paginación
        $cursos = $query->orderBy('fecha_inicio', 'desc')
                       ->paginate(10)
                       ->withQueryString();

        // Obtener lista única de municipios
        $municipios = Curso::where('estado', 'Activo')
                          ->distinct('municipio')
                          ->pluck('municipio')
                          ->sort()
                          ->values();

        return view('pages.cursos', compact('cursos', 'municipios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $curso = new Curso();

        return view('curso.create', compact('curso'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CursoRequest $request): RedirectResponse
    {
        $this->authorize('create', Curso::class);

        try {
            DB::beginTransaction();

            $curso = Curso::create($request->validated());

            DB::commit();

            return redirect()->route('cursos.index')
                ->with('success', 'Curso creado exitosamente.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Error al crear el curso: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $curso = Curso::find($id);

        return view('curso.show', compact('curso'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $curso = Curso::find($id);

        return view('curso.edit', compact('curso'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CursoRequest $request, Curso $curso): RedirectResponse
    {
        $this->authorize('update', $curso);

        try {
            DB::beginTransaction();

            $curso->update($request->validated());

            DB::commit();

            return redirect()->route('cursos.index')
                ->with('success', 'Curso actualizado exitosamente');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Error al actualizar el curso: ' . $e->getMessage());
        }
    }

    public function destroy(Curso $curso): RedirectResponse
    {
        $this->authorize('delete', $curso);

        try {
            DB::beginTransaction();

            $curso->delete();

            DB::commit();

            return redirect()->route('cursos.index')
                ->with('success', 'Curso eliminado exitosamente');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Error al eliminar el curso: ' . $e->getMessage());
        }
    }

    public function inscribir(Request $request): JsonResponse
    {
        $request->validate([
            'cedula' => 'required|string|exists:users,documento',
            'anio' => 'required|numeric|min:1900|max:' . date('Y'),
            'curso_id' => 'required|exists:cursos,id'
        ]);

        try {
            DB::beginTransaction();

            // Verificar que el usuario existe
            $user = Auth::user();
            if (!$user) {
                throw new \Exception('Usuario no autenticado');
            }

            // Verificar que el documento coincide con el usuario autenticado
            if ($user->documento !== $request->cedula) {
                throw new \Exception('El documento no coincide con el usuario autenticado');
            }

            // Verificar si ya está inscrito
            $inscripcionExistente = YInscritosCurso::where([
                'id_curso' => $request->curso_id,
                'id_usuario' => $user->id
            ])->exists();

            if ($inscripcionExistente) {
                return response()->json([
                    'message' => 'Ya estás inscrito en este curso'
                ], 422);
            }

            // Verificar disponibilidad de cupos
            $curso = Curso::findOrFail($request->curso_id);
            $inscritosCount = YInscritosCurso::where('id_curso', $curso->id)->count();

            if ($inscritosCount >= $curso->cupo) {
                return response()->json([
                    'message' => 'No hay cupos disponibles en este curso'
                ], 422);
            }

            // Crear la inscripción
            YInscritosCurso::create([
                'id_curso' => $request->curso_id,
                'id_usuario' => $user->id,
                'estado' => 1,
                'fecha_reg' => now()
            ]);

            DB::commit();

            return response()->json([
                'message' => 'Te has inscrito exitosamente al curso'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'message' => 'Error al procesar la inscripción: ' . $e->getMessage()
            ], 500);
        }
    }
    public function ofertados(Request $request): View
    {
        $query = Curso::query();

        // Filtrar por municipio si se especifica
        if ($request->filled('municipio')) {
            $query->where('municipio', $request->municipio);
        }

        // Filtrar por estado activo
        $query->where('estado', 'Activo');

        // Obtener cursos con paginación
        $cursos = $query->orderBy('fecha_inicio', 'desc')
            ->paginate(10)
            ->withQueryString();

        // Obtener municipios únicos
        $municipios = Curso::where('estado', 'Activo')
            ->distinct('municipio')
            ->pluck('municipio')
            ->sort()
            ->values();

        return view('cursos.ofertados', compact('cursos', 'municipios'));
    }
}
