<?php

namespace App\Http\Controllers;

use App\Models\AccesoRegistro;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\AccesoRegistroRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class AccesoRegistroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $accesoRegistros = AccesoRegistro::paginate();

        return view('acceso-registro.index', compact('accesoRegistros'))
            ->with('i', ($request->input('page', 1) - 1) * $accesoRegistros->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $accesoRegistro = new AccesoRegistro();

        return view('acceso-registro.create', compact('accesoRegistro'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AccesoRegistroRequest $request): RedirectResponse
    {
        AccesoRegistro::create($request->validated());

        return Redirect::route('acceso-registros.index')
            ->with('success', 'AccesoRegistro created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $accesoRegistro = AccesoRegistro::find($id);

        return view('acceso-registro.show', compact('accesoRegistro'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $accesoRegistro = AccesoRegistro::find($id);

        return view('acceso-registro.edit', compact('accesoRegistro'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AccesoRegistroRequest $request, AccesoRegistro $accesoRegistro): RedirectResponse
    {
        $accesoRegistro->update($request->validated());

        return Redirect::route('acceso-registros.index')
            ->with('success', 'AccesoRegistro updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        AccesoRegistro::find($id)->delete();

        return Redirect::route('acceso-registros.index')
            ->with('success', 'AccesoRegistro deleted successfully');
    }
}
