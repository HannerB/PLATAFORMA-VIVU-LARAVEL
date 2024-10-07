<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Http\Controllers\GestionCursoController;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\CursoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Obtén todos los cursos (puedes agregar paginación o filtros si es necesario)
        $cursos = Curso::all();

        // Retorna la vista 'pages.cursos' y pasa la variable $cursos
        return view('pages.cursos', compact('cursos'));
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
        Curso::create($request->validated());

        return Redirect::route('cursos.index')
            ->with('success', 'Curso created successfully.');
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
        $curso->update($request->validated());

        return Redirect::route('cursos.index')
            ->with('success', 'Curso updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Curso::find($id)->delete();

        return Redirect::route('cursos.index')
            ->with('success', 'Curso deleted successfully');
    }
}
