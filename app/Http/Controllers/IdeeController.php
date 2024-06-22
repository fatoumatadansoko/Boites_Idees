<?php

namespace App\Http\Controllers;

use App\Models\Idee;
use App\Models\Categorie;
use App\Http\Requests\StoreUpdateIdeeRequest;

class IdeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $idees = Idee::with('categorie')->get();
        return view('idees.index', compact('idees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categorie::all();
        return view('idees.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateIdeeRequest $request)
    {
        Idee::create($request->validated());

        return redirect()->route('idees.index')->with('success', 'Idée créée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Idee $idee)
    {
        return view('idees.show', compact('idee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Idee $idee)
    {
        $categories = Categorie::all();
        return view('idees.edit', compact('idee', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateIdeeRequest $request, Idee $idee)
    {
        $idee->update($request->validated());

        return redirect()->route('idees.index')->with('success', 'Idée mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Idee $idee)
    {
        $idee->delete();
        return redirect()->route('idees.index')->with('success', 'Idée supprimée avec succès.');
    }
}
