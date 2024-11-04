<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\User;
use App\Models\YInscritosCurso;
use App\Models\GestionCurso;
use App\Models\CursosSolicitado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Verificar autenticación
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $user = auth()->user();
        $role = $user->rol;

        // Datos para los 4 gráficos específicos del diseño original
        $dashboardData = [
            'grafico1' => $this->getMunicipiosCursosStats(),
            'grafico2' => $this->getGeneroStats(),
            'grafico3' => $this->getPoblacionStats(),
            'grafico4' => $this->getCursosSolicitadosStats()
        ];

        // Determinar qué vista mostrar según el rol
        $view = match ($role) {
            '1' => 'pages.dashboard',
            '3' => 'orientador.dashboard',
            '4' => 'gestor.dashboard',
            default => 'certificacion.dashboard',
        };

        return view($view, compact('dashboardData', 'user'));
    }

    private function getMunicipiosCursosStats()
    {
        return GestionCurso::select('Municipio_Curso', DB::raw('count(*) as total'))
            ->groupBy('Municipio_Curso')
            ->get();
    }

    private function getGeneroStats()
    {
        return User::select('sexo', DB::raw('count(*) as total'))
            ->groupBy('sexo')
            ->get();
    }

    private function getPoblacionStats()
    {
        return User::select('tipoPoblacion', DB::raw('count(*) as total'))
            ->groupBy('tipoPoblacion')
            ->get();
    }

    private function getCursosSolicitadosStats()
    {
        return CursosSolicitado::select('nombreCursoSolicitado', DB::raw('count(*) as total'))
            ->groupBy('nombreCursoSolicitado')
            ->get();
    }

    public function graficoUno()
    {
        // Verificar autenticación
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $user = auth()->user();

        // Obtener datos para el gráfico
        $municipiosData = DB::table('cursos')
            ->select(DB::raw('UPPER(municipio) as municipio'), DB::raw('COUNT(*) as ContarMunicipio'))
            ->groupBy('municipio')
            ->get();

        return view('partials.graficos.grafico-uno', compact('municipiosData', 'user'));
    }

    public function graficoDos()
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $user = auth()->user();

        // Obtener datos de género solo para usuarios con rol '2'
        $generosData = DB::table('users')
            ->select(DB::raw('UPPER(sexo) as sexo'), DB::raw('COUNT(*) as ContarSexo'))
            ->where('rol', '2')
            ->groupBy('sexo')
            ->get();

        return view('partials.graficos.grafico-dos', compact('generosData', 'user'));
    }
}
