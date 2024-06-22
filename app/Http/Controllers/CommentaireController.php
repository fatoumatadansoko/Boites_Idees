<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\Idee;
use Illuminate\Http\Request;

class CommentaireController extends Controller
{
    public function create(Idee $idee)
    {
        return view('commentaires.create', compact('idee'));
    }

    public function store(Request $request)
{
    $request->validate([
        'libelle' => 'required|string',
        'nom_complet_auteur' => 'required|string|max:255',
        'idee_id' => 'required|exists:idees,id', // Vérifie que l'idée associée existe dans la table 'idees'
    ]);

    Commentaire::create([
        'libelle' => $request->libelle,
        'nom_complet_auteur' => $request->nom_complet_auteur,
        'idee_id' => $request->idee_id,
    ]);

    return redirect()->route('idees.show', $request->idee_id)->with('success', 'Commentaire ajouté avec succès.');
}


    public function edit(Commentaire $commentaire)
    {
        return view('commentaires.edit', compact('commentaire'));
    }

    public function update(Request $request, Commentaire $commentaire)
    {
        $request->validate([
            'contenu' => 'required|string',
            'nom_complet_auteur' => 'required|string|max:255',
        ]);
    
        $commentaire->update([
            'contenu' => $request->contenu,
            'nom_complet_auteur' => $request->nom_complet_auteur,
        ]);
    
        return redirect()->route('idees.show', $commentaire->idee)->with('success', 'Commentaire mis à jour avec succès.');
        }

    public function destroy(Commentaire $commentaire)
    {
        $idee = $commentaire->idee;
        $commentaire->delete();

        return redirect()->route('idees.show', $idee)->with('success', 'Commentaire supprimé avec succès.');
    }
}
