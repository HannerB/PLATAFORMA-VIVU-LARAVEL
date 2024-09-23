<?php

namespace App\Http\Controllers;

use App\Models\Emprendimiento;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\EmprendimientoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class EmprendimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $emprendimientos = Emprendimiento::paginate();

        return view('emprendimiento.index', compact('emprendimientos'))
            ->with('i', ($request->input('page', 1) - 1) * $emprendimientos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $emprendimiento = new Emprendimiento();

        return view('emprendimiento.create', compact('emprendimiento'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmprendimientoRequest $request): RedirectResponse
    {
        Emprendimiento::create($request->validated());

        return Redirect::route('emprendimientos.index')
            ->with('success', 'Emprendimiento created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $emprendimiento = Emprendimiento::find($id);

        return view('emprendimiento.show', compact('emprendimiento'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $emprendimiento = Emprendimiento::find($id);

        return view('emprendimiento.edit', compact('emprendimiento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmprendimientoRequest $request, Emprendimiento $emprendimiento): RedirectResponse
    {
        $emprendimiento->update($request->validated());

        return Redirect::route('emprendimientos.index')
            ->with('success', 'Emprendimiento updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Emprendimiento::find($id)->delete();

        return Redirect::route('emprendimientos.index')
            ->with('success', 'Emprendimiento deleted successfully');
    }
}
