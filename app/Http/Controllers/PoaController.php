<?php

namespace App\Http\Controllers;

use App\Models\Poa;
use App\Models\GestionCurso;
use App\Models\AsignarMunicipio;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\PoaRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PoaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        try {
            DB::enableQueryLog(); // Habilitar log de queries

            $user = Auth::user();
            Log::info('Usuario autenticado:', [
                'id' => $user->id,
                'rol' => $user->rol,
                'nombre' => $user->nombres
            ]);

            // Verificar municipios asignados
            $municipiosQuery = AsignarMunicipio::where('id_responsable', $user->id)
                ->where('estado', 'activo');

            $municipiosAsignados = $municipiosQuery->get();

            Log::info('Query municipios:', [
                'sql' => $municipiosQuery->toSql(),
                'bindings' => $municipiosQuery->getBindings(),
                'count' => $municipiosAsignados->count()
            ]);

            // Obtener POAs
            $poas = $this->getPoasByRole($user);

            Log::info('Queries ejecutadas:', DB::getQueryLog());

            Log::info('Resultado de consultas:', [
                'municipios_count' => $municipiosAsignados->count(),
                'poas_count' => $poas->count(),
                'municipios' => $municipiosAsignados->toArray(),
                'poas' => $poas->toArray()
            ]);

            return view('pages.poa', compact('municipiosAsignados', 'poas'));
        } catch (\Exception $e) {
            Log::error('Error en index:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return view('pages.poa', [
                'municipiosAsignados' => collect([]),
                'poas' => collect([])
            ])->with('error', 'Error al cargar los datos: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $poa = new Poa();

        return view('poa.create', compact('poa'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'municipio' => 'required',
            'Nombre_Poa' => 'required',
            'Persona_Enlace' => 'required',
            'Telefono_Enlace' => 'required',
            'Correo_Enlace' => 'required|email',
            'Poblacion' => 'required',
            'Ocupacion_Productiva' => 'required',
        ]);

        Poa::create([
            'id_asignar_municipios' => $request->municipio,
            'Nombre_Poa' => $request->Nombre_Poa,
            'Persona_Enlace' => $request->Persona_Enlace,
            'Telefono_Enlace' => $request->Telefono_Enlace,
            'Correo_Enlace' => $request->Correo_Enlace,
            'Poblacion' => $request->Poblacion,
            'Ocupacion_Productiva' => $request->Ocupacion_Productiva,
        ]);

        return redirect()->route('poa.index')->with('success', 'POA creado exitosamente');
    }
    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $poa = Poa::find($id);

        return view('poa.edit', compact('poa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        try {
            $poa = Poa::findOrFail($request->poa_id);

            $validated = $request->validate([
                'gfgnombres' => 'required',
                'gfgPersona_Enlace' => 'required',
                'gfgTelefono_Enlace' => 'required',
                'gfgOcupacion_Productiva' => 'required',
            ]);

            $poa->update([
                'Nombre_Poa' => $request->gfgnombres,
                'Persona_Enlace' => $request->gfgPersona_Enlace,
                'Telefono_Enlace' => $request->gfgTelefono_Enlace,
                'Ocupacion_Productiva' => $request->gfgOcupacion_Productiva,
            ]);

            return redirect()->route('poa')
                ->with('success', 'POA actualizado exitosamente');
        } catch (\Exception $e) {
            Log::error('Error al actualizar POA: ' . $e->getMessage());
            return redirect()->route('poa')
                ->with('error', 'Error al actualizar POA');
        }
    }

    public function destroy($id)
    {
        try {
            $poa = Poa::findOrFail($id);

            if ($poa->gestionCursos()->count() > 0) {
                return redirect()->route('poa.index')
                    ->with('error', 'No se puede eliminar este POA - tiene formaciones registradas');
            }

            $poa->delete();
            return redirect()->route('poa')
                ->with('success', 'POA eliminado exitosamente');
        } catch (\Exception $e) {
            Log::error('Error al eliminar POA: ' . $e->getMessage());
            return redirect()->route('poa')
                ->with('error', 'Error al eliminar POA');
        }
    }

    private function getPoasByRole($user)
    {
        try {
            DB::enableQueryLog();

            $query = Poa::with(['asignarMunicipio', 'gestionCursos']);

            if ($user->rol === '3') { // Orientador
                $query->whereHas('asignarMunicipio', function ($q) use ($user) {
                    $q->where('id_responsable', $user->id)
                        ->where('estado', 'activo');
                });
            } elseif ($user->rol === '1') { // Administrador
                // No aplicar filtros adicionales
            } else { // Alianza
                $query->whereHas('alianzaMunicipios', function ($q) use ($user) {
                    $q->where('id_User', $user->id)
                        ->where('estado', 'activo');
                });
            }

            $result = $query->orderBy('id_poa', 'DESC')->get();

            Log::info('Query POAs:', [
                'sql' => $query->toSql(),
                'bindings' => $query->getBindings(),
                'count' => $result->count(),
                'queries' => DB::getQueryLog()
            ]);

            return $result;
        } catch (\Exception $e) {
            Log::error('Error en getPoasByRole:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return collect([]);
        }
    }

    public function poa2()
    {
        $poas = Poa::with(['gestionCursos', 'asignarMunicipio'])->get();
        return view('pages.poa2', compact('poas'));
    }

    public function detalle($id)
    {
        try {
            $curso = GestionCurso::findOrFail($id);
            $inscritos = $curso->inscritos->count();
            $estadoCurso = $curso->Estado_Curso;

            return view('poa.curso_detalle', compact('curso', 'inscritos', 'estadoCurso'));
        } catch (\Exception $e) {
            Log::error('Error en detalle: ' . $e->getMessage());
            Log::error($e->getTraceAsString());
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
}
