<?php

namespace App\Http\Controllers;

use App\Models\GestionCurso;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\GestionCursoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class GestionCursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
    public function update(GestionCursoRequest $request, GestionCurso $gestionCurso): RedirectResponse
    {
        $gestionCurso->update($request->validated());

        return Redirect::route('gestion-cursos.index')
            ->with('success', 'GestionCurso updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        GestionCurso::find($id)->delete();

        return Redirect::route('gestion-cursos.index')
            ->with('success', 'GestionCurso deleted successfully');
    }
}
