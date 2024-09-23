<?php

namespace App\Http\Controllers;

use App\Models\Concertacione;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ConcertacioneRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ConcertacioneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $concertaciones = Concertacione::paginate();

        return view('concertacione.index', compact('concertaciones'))
            ->with('i', ($request->input('page', 1) - 1) * $concertaciones->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $concertacione = new Concertacione();

        return view('concertacione.create', compact('concertacione'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ConcertacioneRequest $request): RedirectResponse
    {
        Concertacione::create($request->validated());

        return Redirect::route('concertaciones.index')
            ->with('success', 'Concertacione created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $concertacione = Concertacione::find($id);

        return view('concertacione.show', compact('concertacione'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $concertacione = Concertacione::find($id);

        return view('concertacione.edit', compact('concertacione'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ConcertacioneRequest $request, Concertacione $concertacione): RedirectResponse
    {
        $concertacione->update($request->validated());

        return Redirect::route('concertaciones.index')
            ->with('success', 'Concertacione updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Concertacione::find($id)->delete();

        return Redirect::route('concertaciones.index')
            ->with('success', 'Concertacione deleted successfully');
    }
}
