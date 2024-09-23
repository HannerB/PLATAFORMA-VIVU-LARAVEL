<?php

namespace App\Http\Controllers;

use App\Models\YTipoUsuario;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\YTipoUsuarioRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class YTipoUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $yTipoUsuarios = YTipoUsuario::paginate();

        return view('y-tipo-usuario.index', compact('yTipoUsuarios'))
            ->with('i', ($request->input('page', 1) - 1) * $yTipoUsuarios->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $yTipoUsuario = new YTipoUsuario();

        return view('y-tipo-usuario.create', compact('yTipoUsuario'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(YTipoUsuarioRequest $request): RedirectResponse
    {
        YTipoUsuario::create($request->validated());

        return Redirect::route('y-tipo-usuarios.index')
            ->with('success', 'YTipoUsuario created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $yTipoUsuario = YTipoUsuario::find($id);

        return view('y-tipo-usuario.show', compact('yTipoUsuario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $yTipoUsuario = YTipoUsuario::find($id);

        return view('y-tipo-usuario.edit', compact('yTipoUsuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(YTipoUsuarioRequest $request, YTipoUsuario $yTipoUsuario): RedirectResponse
    {
        $yTipoUsuario->update($request->validated());

        return Redirect::route('y-tipo-usuarios.index')
            ->with('success', 'YTipoUsuario updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        YTipoUsuario::find($id)->delete();

        return Redirect::route('y-tipo-usuarios.index')
            ->with('success', 'YTipoUsuario deleted successfully');
    }
}
