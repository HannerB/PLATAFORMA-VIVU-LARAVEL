<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\GrupoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class GrupoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $grupos = Grupo::paginate();

        return view('grupo.index', compact('grupos'))
            ->with('i', ($request->input('page', 1) - 1) * $grupos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $grupo = new Grupo();

        return view('grupo.create', compact('grupo'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GrupoRequest $request): RedirectResponse
    {
        Grupo::create($request->validated());

        return Redirect::route('grupos.index')
            ->with('success', 'Grupo created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $grupo = Grupo::find($id);

        return view('grupo.show', compact('grupo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $grupo = Grupo::find($id);

        return view('grupo.edit', compact('grupo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GrupoRequest $request, Grupo $grupo): RedirectResponse
    {
        $grupo->update($request->validated());

        return Redirect::route('grupos.index')
            ->with('success', 'Grupo updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Grupo::find($id)->delete();

        return Redirect::route('grupos.index')
            ->with('success', 'Grupo deleted successfully');
    }
}
