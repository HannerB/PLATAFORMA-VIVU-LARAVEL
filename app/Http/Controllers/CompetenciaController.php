<?php

namespace App\Http\Controllers;

use App\Models\Competencia;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\CompetenciaRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class CompetenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $competencias = Competencia::paginate();

        return view('competencia.index', compact('competencias'))
            ->with('i', ($request->input('page', 1) - 1) * $competencias->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $competencia = new Competencia();

        return view('competencia.create', compact('competencia'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompetenciaRequest $request): RedirectResponse
    {
        Competencia::create($request->validated());

        return Redirect::route('competencias.index')
            ->with('success', 'Competencia created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $competencia = Competencia::find($id);

        return view('competencia.show', compact('competencia'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $competencia = Competencia::find($id);

        return view('competencia.edit', compact('competencia'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompetenciaRequest $request, Competencia $competencia): RedirectResponse
    {
        $competencia->update($request->validated());

        return Redirect::route('competencias.index')
            ->with('success', 'Competencia updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Competencia::find($id)->delete();

        return Redirect::route('competencias.index')
            ->with('success', 'Competencia deleted successfully');
    }
}
