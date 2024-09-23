<?php

namespace App\Http\Controllers;

use App\Models\CursosSolicitado;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\CursosSolicitadoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class CursosSolicitadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $cursosSolicitados = CursosSolicitado::paginate();

        return view('cursos-solicitado.index', compact('cursosSolicitados'))
            ->with('i', ($request->input('page', 1) - 1) * $cursosSolicitados->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $cursosSolicitado = new CursosSolicitado();

        return view('cursos-solicitado.create', compact('cursosSolicitado'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CursosSolicitadoRequest $request): RedirectResponse
    {
        CursosSolicitado::create($request->validated());

        return Redirect::route('cursos-solicitados.index')
            ->with('success', 'CursosSolicitado created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $cursosSolicitado = CursosSolicitado::find($id);

        return view('cursos-solicitado.show', compact('cursosSolicitado'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $cursosSolicitado = CursosSolicitado::find($id);

        return view('cursos-solicitado.edit', compact('cursosSolicitado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CursosSolicitadoRequest $request, CursosSolicitado $cursosSolicitado): RedirectResponse
    {
        $cursosSolicitado->update($request->validated());

        return Redirect::route('cursos-solicitados.index')
            ->with('success', 'CursosSolicitado updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        CursosSolicitado::find($id)->delete();

        return Redirect::route('cursos-solicitados.index')
            ->with('success', 'CursosSolicitado deleted successfully');
    }
}
