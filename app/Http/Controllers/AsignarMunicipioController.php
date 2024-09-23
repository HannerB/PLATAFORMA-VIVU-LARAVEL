<?php

namespace App\Http\Controllers;

use App\Models\AsignarMunicipio;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\AsignarMunicipioRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class AsignarMunicipioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $asignarMunicipios = AsignarMunicipio::paginate();

        return view('asignar-municipio.index', compact('asignarMunicipios'))
            ->with('i', ($request->input('page', 1) - 1) * $asignarMunicipios->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $asignarMunicipio = new AsignarMunicipio();

        return view('asignar-municipio.create', compact('asignarMunicipio'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AsignarMunicipioRequest $request): RedirectResponse
    {
        AsignarMunicipio::create($request->validated());

        return Redirect::route('asignar-municipios.index')
            ->with('success', 'AsignarMunicipio created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $asignarMunicipio = AsignarMunicipio::find($id);

        return view('asignar-municipio.show', compact('asignarMunicipio'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $asignarMunicipio = AsignarMunicipio::find($id);

        return view('asignar-municipio.edit', compact('asignarMunicipio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AsignarMunicipioRequest $request, AsignarMunicipio $asignarMunicipio): RedirectResponse
    {
        $asignarMunicipio->update($request->validated());

        return Redirect::route('asignar-municipios.index')
            ->with('success', 'AsignarMunicipio updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        AsignarMunicipio::find($id)->delete();

        return Redirect::route('asignar-municipios.index')
            ->with('success', 'AsignarMunicipio deleted successfully');
    }
}
