<?php

namespace App\Http\Controllers;

use App\Models\Idee;
use App\Models\Categorie;
use Illuminate\Http\Request;

class IdeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $idees = Idee::with('categorie')->get();
        return view('idees.index', compact('idees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categorie::all();
        return view('idees.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'libelle' => 'required|string|max:255',
            'description' => 'required|string',
            'auteur_nom_complet' => 'required|string|max:255',
            'auteur_email' => 'required|email',
            'status' => 'required|in:approuvee,refusee',
            'categorie_id' => 'required|exists:categories,id',
        ]);

        Idee::create([
            'libelle' => $request->libelle,
            'description' => $request->description,
            'auteur_nom_complet' => $request->auteur_nom_complet,
            'auteur_email' => $request->auteur_email,
            'status' => $request->status,
            'categorie_id' => $request->categorie_id,
        ]);

        return redirect()->route('idees.index')->with('success', 'Idée créée avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Idee  $idee
     * @return \Illuminate\Http\Response
     */
    public function show(Idee $idee)
    {
        return view('idees.show', compact('idee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Idee  $idee
     * @return \Illuminate\Http\Response
     */
    public function edit(Idee $idee)
    {
        $categories = Categorie::all();
        return view('idees.edit', compact('idee', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Idee  $idee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Idee $idee)
    {
        $request->validate([
            'libelle' => 'required|string|max:255',
            'description' => 'required|string',
            'auteur_nom_complet' => 'required|string|max:255',
            'auteur_email' => 'required|email',
            'status' => 'required|in:approuvee,refusee',
            'categorie_id' => 'required|exists:categories,id',
        ]);

        $idee->update([
            'libelle' => $request->libelle,
            'description' => $request->description,
            'auteur_nom_complet' => $request->auteur_nom_complet,
            'auteur_email' => $request->auteur_email,
            'status' => $request->status,
            'categorie_id' => $request->categorie_id,
        ]);

        return redirect()->route('idees.index')->with('success', 'Idée mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Idee  $idee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Idee $idee)
    {
        $idee->delete();
        return redirect()->route('idees.index')->with('success', 'Idée supprimée avec succès.');
    }
}
