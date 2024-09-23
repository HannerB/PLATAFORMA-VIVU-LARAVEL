<?php

namespace App\Http\Controllers;

use App\Models\YEstado;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\YEstadoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class YEstadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $yEstados = YEstado::paginate();

        return view('y-estado.index', compact('yEstados'))
            ->with('i', ($request->input('page', 1) - 1) * $yEstados->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $yEstado = new YEstado();

        return view('y-estado.create', compact('yEstado'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(YEstadoRequest $request): RedirectResponse
    {
        YEstado::create($request->validated());

        return Redirect::route('y-estados.index')
            ->with('success', 'YEstado created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $yEstado = YEstado::find($id);

        return view('y-estado.show', compact('yEstado'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $yEstado = YEstado::find($id);

        return view('y-estado.edit', compact('yEstado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(YEstadoRequest $request, YEstado $yEstado): RedirectResponse
    {
        $yEstado->update($request->validated());

        return Redirect::route('y-estados.index')
            ->with('success', 'YEstado updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        YEstado::find($id)->delete();

        return Redirect::route('y-estados.index')
            ->with('success', 'YEstado deleted successfully');
    }
}
