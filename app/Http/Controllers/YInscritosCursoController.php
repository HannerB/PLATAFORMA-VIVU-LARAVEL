<?php

namespace App\Http\Controllers;

use App\Models\YInscritosCurso;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\YInscritosCursoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class YInscritosCursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $yInscritosCursos = YInscritosCurso::paginate();

        return view('y-inscritos-curso.index', compact('yInscritosCursos'))
            ->with('i', ($request->input('page', 1) - 1) * $yInscritosCursos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $yInscritosCurso = new YInscritosCurso();

        return view('y-inscritos-curso.create', compact('yInscritosCurso'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(YInscritosCursoRequest $request): RedirectResponse
    {
        YInscritosCurso::create($request->validated());

        return Redirect::route('y-inscritos-cursos.index')
            ->with('success', 'YInscritosCurso created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $yInscritosCurso = YInscritosCurso::find($id);

        return view('y-inscritos-curso.show', compact('yInscritosCurso'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $yInscritosCurso = YInscritosCurso::find($id);

        return view('y-inscritos-curso.edit', compact('yInscritosCurso'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(YInscritosCursoRequest $request, YInscritosCurso $yInscritosCurso): RedirectResponse
    {
        $yInscritosCurso->update($request->validated());

        return Redirect::route('y-inscritos-cursos.index')
            ->with('success', 'YInscritosCurso updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        YInscritosCurso::find($id)->delete();

        return Redirect::route('y-inscritos-cursos.index')
            ->with('success', 'YInscritosCurso deleted successfully');
    }
}
