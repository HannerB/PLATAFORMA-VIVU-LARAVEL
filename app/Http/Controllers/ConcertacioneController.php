<?php

namespace App\Http\Controllers;

use App\Models\Concertacione;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ConcertacioneRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
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
        $cursos = DB::table('concertaciones')
            ->join('gestion_cursos', 'concertaciones.id_gestion_cursos', '=', 'gestion_cursos.id_Gestion_Cursos')
            ->where('concertaciones.id_concertacion', $id)
            ->select('gestion_cursos.*')
            ->get();

        return view('modals.concertaciones.cursos', compact('cursos'));
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
    public function store(ConcertacioneRequest $request): RedirectResponse
    {
        Concertacione::create($request->validated());

        return Redirect::route('concertaciones.index')
            ->with('success', 'Concertacione created successfully.');
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
