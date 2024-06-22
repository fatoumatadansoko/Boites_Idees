<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function index()
    {
        $categories = Categorie::all();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'libelle' => 'required|string|max:255',
        ]);

        Categorie::create([
            'libelle' => $request->libelle,
        ]);

        return redirect()->route('categories.index')->with('success', 'Catégorie créée avec succès.');
    }

    // public function show(Categorie $categorie)
    // {
    //     return view('categories.show', compact('categorie'));
    // }

    public function edit($category)
    {
        // Récupérer l'categorie par son identifiant
        $categorie = Categorie::find($category);
        return view('categories.edit', compact('categorie'));
    }

    public function update(Request $request, Categorie $category)
    
    {
        $request->validate([
            'libelle' => 'required|string|max:255',
        ]);

        $category->update([
            'libelle' => $request->libelle,
        ]);

        return redirect()->route('categories.index')->with('success', 'Catégorie mise à jour avec succès.');
    }

    public function destroy(Categorie $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Catégorie supprimée avec succès.');
    }
}
