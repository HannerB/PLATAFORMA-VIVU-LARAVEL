<?php

namespace App\Http\Controllers;

use App\Models\CursosDetalle;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\CursosDetalleRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class CursosDetalleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $cursosDetalles = CursosDetalle::paginate();

        return view('cursos-detalle.index', compact('cursosDetalles'))
            ->with('i', ($request->input('page', 1) - 1) * $cursosDetalles->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $cursosDetalle = new CursosDetalle();

        return view('cursos-detalle.create', compact('cursosDetalle'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CursosDetalleRequest $request): RedirectResponse
    {
        CursosDetalle::create($request->validated());

        return Redirect::route('cursos-detalles.index')
            ->with('success', 'CursosDetalle created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $cursosDetalle = CursosDetalle::find($id);

        return view('cursos-detalle.show', compact('cursosDetalle'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $cursosDetalle = CursosDetalle::find($id);

        return view('cursos-detalle.edit', compact('cursosDetalle'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CursosDetalleRequest $request, CursosDetalle $cursosDetalle): RedirectResponse
    {
        $cursosDetalle->update($request->validated());

        return Redirect::route('cursos-detalles.index')
            ->with('success', 'CursosDetalle updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        CursosDetalle::find($id)->delete();

        return Redirect::route('cursos-detalles.index')
            ->with('success', 'CursosDetalle deleted successfully');
    }
}
