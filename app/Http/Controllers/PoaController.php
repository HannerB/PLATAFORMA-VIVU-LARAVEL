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
    private $municipios = [
        'BARANOA',
        'BARRANQUILLA',
        'CAMPO DE LA CRUZ',
        'CANDELARIA',
        'GALAPA',
        'JUAN DE ACOSTA',
        'LURUACO',
        'MALAMBO',
        'MANATÍ',
        'PALMAR DE VARELA',
        'PIOJÓ',
        'POLONUEVO',
        'PONEDERA',
        'PUERTO COLOMBIA',
        'REPELÓN',
        'SABANAGRANDE',
        'SABANALARGA',
        'SANTA LUCÍA',
        'SANTO TOMÁS',
        'SOLEDAD',
        'SUÁN',
        'TUBARÁ',
        'USIACURÍ'
    ];


    public function index(Request $request): View
    {
        try {
            DB::enableQueryLog();

            $user = Auth::user();

            // Verificar municipios asignados
            $municipiosQuery = AsignarMunicipio::where('id_responsable', $user->id)
                ->where('estado', 'activo');

            $municipiosAsignados = $municipiosQuery->get();

            // Obtener POAs
            $poas = $this->getPoasByRole($user);

            // Agregar municipios predefinidos
            $municipiosAtlantico = $this->municipios;

            return view('pages.poa', compact('municipiosAsignados', 'poas', 'municipiosAtlantico'));
        } catch (\Exception $e) {
            Log::error('Error en index:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return view('pages.poa', [
                'municipiosAsignados' => collect([]),
                'poas' => collect([]),
                'municipiosAtlantico' => $this->municipios
            ])->with('error', 'Error al cargar los datos: ' . $e->getMessage());
        }
    }

    // Método helper para obtener los municipios
    private function getMunicipiosAtlantico()
    {
        return $this->municipios;
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

        try {
            // Primero crear o buscar el asignarMunicipio
            $asignarMunicipio = AsignarMunicipio::firstOrCreate([
                'municipio' => $request->municipio,
                'id_responsable' => Auth::id(),
                'estado' => 'activo'
            ], [
                'periodo' => date('Y'),
                'fecha_registro' => now()
            ]);

            // Luego crear el POA
            Poa::create([
                'id_asignar_municipios' => $asignarMunicipio->id,
                'Nombre_Poa' => $request->Nombre_Poa,
                'Persona_Enlace' => $request->Persona_Enlace,
                'Telefono_Enlace' => $request->Telefono_Enlace,
                'Correo_Enlace' => $request->Correo_Enlace,
                'Poblacion' => $request->Poblacion,
                'Ocupacion_Productiva' => $request->Ocupacion_Productiva,
            ]);

            return redirect()->route('poa')->with('success', 'POA creado exitosamente');
        } catch (\Exception $e) {
            Log::error('Error al crear POA: ' . $e->getMessage());
            return redirect()->route('poa')->with('error', 'Error al crear el POA');
        }
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

            if ($user->hasAlianza()) {
                // Modificar la consulta para usar las columnas correctas
                $query->whereHas('alianzaMunicipios', function ($q) use ($user) {
                    $q->where('id_User', $user->id)
                        ->where('estado', 'activo');
                });
            } elseif ($user->rol === '3') {
                $query->whereHas('asignarMunicipio', function ($q) use ($user) {
                    $q->where('id_responsable', $user->id)
                        ->where('estado', 'activo');
                });
            } elseif ($user->rol === '1') {
                // No aplicar filtros adicionales
            }

            return $query->orderBy('id_poa', 'DESC')->get();
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

    public function planeacion(Request $request): View
    {
        $municipio = $request->get('filtro', '');

        $cursos = DB::table('gestion_cursos')
            ->join('poa', 'poa.id_poa', '=', 'gestion_cursos.id_nombre_poa')
            ->join('asignar_municipios', 'asignar_municipios.id', '=', 'poa.id_asignar_municipios')
            ->join('users', 'users.id', '=', 'asignar_municipios.id_responsable')
            ->where('gestion_cursos.Municipio_Curso', 'LIKE', "%{$municipio}%")
            ->orderBy('gestion_cursos.id_Gestion_Cursos', 'DESC')
            ->select(
                'gestion_cursos.*',
                'poa.Nombre_Poa',
                'users.nombres',
                'users.apellidos',
                'asignar_municipios.periodo'
            )
            ->get();

        // Obtener el conteo de inscritos para cada curso
        foreach ($cursos as $curso) {
            $inscritos = DB::table('cursos_detalle')
                ->where('id_gestion_cursos', $curso->id_Gestion_Cursos)
                ->count();
            $curso->inscritos = $inscritos;
        }

        return view('pages.planeacion', compact('cursos', 'municipio'));
    }
}
