<?php

namespace App\Http\Controllers;

use App\Models\AlianzaMunicipio;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\AlianzaMunicipioRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class AlianzaMunicipioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $alianzaMunicipios = AlianzaMunicipio::paginate();

        return view('alianza-municipio.index', compact('alianzaMunicipios'))
            ->with('i', ($request->input('page', 1) - 1) * $alianzaMunicipios->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $alianzaMunicipio = new AlianzaMunicipio();

        return view('alianza-municipio.create', compact('alianzaMunicipio'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AlianzaMunicipioRequest $request): RedirectResponse
    {
        AlianzaMunicipio::create($request->validated());

        return Redirect::route('alianza-municipios.index')
            ->with('success', 'AlianzaMunicipio created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $alianzaMunicipio = AlianzaMunicipio::find($id);

        return view('alianza-municipio.show', compact('alianzaMunicipio'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $alianzaMunicipio = AlianzaMunicipio::find($id);

        return view('alianza-municipio.edit', compact('alianzaMunicipio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AlianzaMunicipioRequest $request, AlianzaMunicipio $alianzaMunicipio): RedirectResponse
    {
        $alianzaMunicipio->update($request->validated());

        return Redirect::route('alianza-municipios.index')
            ->with('success', 'AlianzaMunicipio updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        AlianzaMunicipio::find($id)->delete();

        return Redirect::route('alianza-municipios.index')
            ->with('success', 'AlianzaMunicipio deleted successfully');
    }
}
