<?php

namespace App\Http\Controllers;

use App\Models\TJuego;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\TJuegoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class TJuegoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $tJuegos = TJuego::paginate();

        return view('t-juego.index', compact('tJuegos'))
            ->with('i', ($request->input('page', 1) - 1) * $tJuegos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $tJuego = new TJuego();

        return view('t-juego.create', compact('tJuego'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TJuegoRequest $request): RedirectResponse
    {
        TJuego::create($request->validated());

        return Redirect::route('t-juegos.index')
            ->with('success', 'TJuego created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $tJuego = TJuego::find($id);

        return view('t-juego.show', compact('tJuego'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $tJuego = TJuego::find($id);

        return view('t-juego.edit', compact('tJuego'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TJuegoRequest $request, TJuego $tJuego): RedirectResponse
    {
        $tJuego->update($request->validated());

        return Redirect::route('t-juegos.index')
            ->with('success', 'TJuego updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        TJuego::find($id)->delete();

        return Redirect::route('t-juegos.index')
            ->with('success', 'TJuego deleted successfully');
    }
}
