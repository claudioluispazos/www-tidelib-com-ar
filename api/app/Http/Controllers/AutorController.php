<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\AutorRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class AutorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $autors = Autor::paginate();

        return view('autor.index', compact('autors'))
            ->with('i', ($request->input('page', 1) - 1) * $autors->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $autor = new Autor();

        return view('autor.create', compact('autor'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AutorRequest $request): RedirectResponse
    {
        Autor::create($request->validated());

        return Redirect::route('autors.index')
            ->with('success', 'Autor created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $autor = Autor::find($id);

        return view('autor.show', compact('autor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $autor = Autor::find($id);

        return view('autor.edit', compact('autor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AutorRequest $request, Autor $autor): RedirectResponse
    {
        $autor->update($request->validated());

        return Redirect::route('autors.index')
            ->with('success', 'Autor updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Autor::find($id)->delete();

        return Redirect::route('autors.index')
            ->with('success', 'Autor deleted successfully');
    }
}
