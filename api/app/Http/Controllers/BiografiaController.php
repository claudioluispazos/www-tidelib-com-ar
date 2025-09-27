<?php

namespace App\Http\Controllers;

use App\Models\Biografia;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\BiografiaRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class BiografiaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $biografias = Biografia::paginate();

        return view('biografia.index', compact('biografias'))
            ->with('i', ($request->input('page', 1) - 1) * $biografias->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $biografia = new Biografia();

        return view('biografia.create', compact('biografia'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BiografiaRequest $request): RedirectResponse
    {
        Biografia::create($request->validated());

        return Redirect::route('biografias.index')
            ->with('success', 'Biografia created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $biografia = Biografia::find($id);

        return view('biografia.show', compact('biografia'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $biografia = Biografia::find($id);

        return view('biografia.edit', compact('biografia'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BiografiaRequest $request, Biografia $biografia): RedirectResponse
    {
        $biografia->update($request->validated());

        return Redirect::route('biografias.index')
            ->with('success', 'Biografia updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Biografia::find($id)->delete();

        return Redirect::route('biografias.index')
            ->with('success', 'Biografia deleted successfully');
    }
}
