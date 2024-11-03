<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\User;
use App\Models\YInscritosCurso;
use App\Models\GestionCurso;
use App\Models\Emprendimiento;
use App\Models\Poa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Estadísticas generales
        $stats = [
            'total_usuarios' => User::count(),
            'total_cursos' => Curso::count(),
            'total_inscritos' => YInscritosCurso::count(),
            'total_emprendimientos' => Emprendimiento::count(),
        ];

        // Cursos más populares
        $cursos_populares = YInscritosCurso::select('id_curso', DB::raw('count(*) as total'))
            ->groupBy('id_curso')
            ->with('curso')
            ->orderBy('total', 'DESC')
            ->limit(5)
            ->get();

        // Estadísticas por municipio
        $stats_municipios = GestionCurso::select('Municipio_Curso', DB::raw('count(*) as total_cursos'))
            ->groupBy('Municipio_Curso')
            ->get();

        // Estado de POAs
        $stats_poa = Poa::select('estado', DB::raw('count(*) as total'))
            ->groupBy('estado')
            ->get();

        // Inscripciones mensuales
        $inscripciones_mensuales = YInscritosCurso::select(
            DB::raw('MONTH(fecha_reg) as mes'),
            DB::raw('COUNT(*) as total')
        )
            ->whereYear('fecha_reg', date('Y'))
            ->groupBy('mes')
            ->get();

        // Últimos usuarios registrados
        $ultimos_usuarios = User::latest('fechaRegistro')
            ->limit(5)
            ->get();

        // Próximos cursos a iniciar
        $proximos_cursos = Curso::where('fecha_inicio', '>', now())
            ->orderBy('fecha_inicio', 'ASC')
            ->limit(5)
            ->get();

        return view('pages.dashboard', compact(
            'stats',
            'cursos_populares',
            'stats_municipios',
            'stats_poa',
            'inscripciones_mensuales',
            'ultimos_usuarios',
            'proximos_cursos'
        ));
    }
}
