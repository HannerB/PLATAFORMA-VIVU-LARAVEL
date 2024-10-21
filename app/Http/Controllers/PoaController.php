<?php

namespace App\Http\Controllers;

use App\Models\Poa;
use App\Models\GestionCurso;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\PoaRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;

class PoaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $poas = Poa::paginate();

        return view('poa.index', compact('poas'))
            ->with('i', ($request->input('page', 1) - 1) * $poas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $poa = new Poa();

        return view('poa.create', compact('poa'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PoaRequest $request): RedirectResponse
    {
        Poa::create($request->validated());

        return Redirect::route('poas.index')
            ->with('success', 'Poa created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function Gestion_cursos2($id_poa)
    {
        try {
            $gestionCursos = GestionCurso::where('id_nombre_poa', $id_poa)->with('inscritos')->get();
            $poa = Poa::where('id_poa', $id_poa)->firstOrFail();
            return view('poa.Gestion_cursos2', compact('gestionCursos', 'poa'));
        } catch (\Exception $e) {
            Log::error('Error en Gestion_cursos2: ' . $e->getMessage());
            Log::error($e->getTraceAsString());
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $poa = Poa::find($id);

        return view('poa.edit', compact('poa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PoaRequest $request, Poa $poa): RedirectResponse
    {
        $poa->update($request->validated());

        return Redirect::route('poas.index')
            ->with('success', 'Poa updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Poa::find($id)->delete();

        return Redirect::route('poas.index')
            ->with('success', 'Poa deleted successfully');
    }

    public function poa2()
    {
        $poas = Poa::with('gestionCursos')->get();
        return view('pages.poa2', compact('poas'));
    }
}
