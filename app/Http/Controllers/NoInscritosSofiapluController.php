<?php

namespace App\Http\Controllers;

use App\Models\NoInscritosSofiaplu;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\NoInscritosSofiapluRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class NoInscritosSofiapluController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $noInscritosSofiaplus = NoInscritosSofiaplu::paginate();

        return view('no-inscritos-sofiaplu.index', compact('noInscritosSofiaplus'))
            ->with('i', ($request->input('page', 1) - 1) * $noInscritosSofiaplus->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $noInscritosSofiaplu = new NoInscritosSofiaplu();

        return view('no-inscritos-sofiaplu.create', compact('noInscritosSofiaplu'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NoInscritosSofiapluRequest $request): RedirectResponse
    {
        NoInscritosSofiaplu::create($request->validated());

        return Redirect::route('no-inscritos-sofiaplus.index')
            ->with('success', 'NoInscritosSofiaplu created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $noInscritosSofiaplu = NoInscritosSofiaplu::find($id);

        return view('no-inscritos-sofiaplu.show', compact('noInscritosSofiaplu'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $noInscritosSofiaplu = NoInscritosSofiaplu::find($id);

        return view('no-inscritos-sofiaplu.edit', compact('noInscritosSofiaplu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NoInscritosSofiapluRequest $request, NoInscritosSofiaplu $noInscritosSofiaplu): RedirectResponse
    {
        $noInscritosSofiaplu->update($request->validated());

        return Redirect::route('no-inscritos-sofiaplus.index')
            ->with('success', 'NoInscritosSofiaplu updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        NoInscritosSofiaplu::find($id)->delete();

        return Redirect::route('no-inscritos-sofiaplus.index')
            ->with('success', 'NoInscritosSofiaplu deleted successfully');
    }
}
