<?php

namespace App\Http\Controllers;

use App\Models\FilesConcertacione;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\FilesConcertacioneRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class FilesConcertacioneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $filesConcertaciones = FilesConcertacione::paginate();

        return view('files-concertacione.index', compact('filesConcertaciones'))
            ->with('i', ($request->input('page', 1) - 1) * $filesConcertaciones->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $filesConcertacione = new FilesConcertacione();

        return view('files-concertacione.create', compact('filesConcertacione'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FilesConcertacioneRequest $request): RedirectResponse
    {
        FilesConcertacione::create($request->validated());

        return Redirect::route('files-concertaciones.index')
            ->with('success', 'FilesConcertacione created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $filesConcertacione = FilesConcertacione::find($id);

        return view('files-concertacione.show', compact('filesConcertacione'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $filesConcertacione = FilesConcertacione::find($id);

        return view('files-concertacione.edit', compact('filesConcertacione'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FilesConcertacioneRequest $request, FilesConcertacione $filesConcertacione): RedirectResponse
    {
        $filesConcertacione->update($request->validated());

        return Redirect::route('files-concertaciones.index')
            ->with('success', 'FilesConcertacione updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        FilesConcertacione::find($id)->delete();

        return Redirect::route('files-concertaciones.index')
            ->with('success', 'FilesConcertacione deleted successfully');
    }
}
