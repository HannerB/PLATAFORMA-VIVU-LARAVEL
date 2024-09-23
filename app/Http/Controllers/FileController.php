<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\FileRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $files = File::paginate();

        return view('file.index', compact('files'))
            ->with('i', ($request->input('page', 1) - 1) * $files->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $file = new File();

        return view('file.create', compact('file'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FileRequest $request): RedirectResponse
    {
        File::create($request->validated());

        return Redirect::route('files.index')
            ->with('success', 'File created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $file = File::find($id);

        return view('file.show', compact('file'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $file = File::find($id);

        return view('file.edit', compact('file'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FileRequest $request, File $file): RedirectResponse
    {
        $file->update($request->validated());

        return Redirect::route('files.index')
            ->with('success', 'File updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        File::find($id)->delete();

        return Redirect::route('files.index')
            ->with('success', 'File deleted successfully');
    }
}
