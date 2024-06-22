<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\Idee;
use App\Http\Requests\StoreUpdateCommentaireRequest;
use Illuminate\Http\Request;

class CommentaireController extends Controller
{
    public function create(Idee $idee)
    {
        return view('commentaires.create', compact('idee'));
    }

    public function store(StoreUpdateCommentaireRequest $request)
    {
        Commentaire::create($request->validated());

        return redirect()->route('idees.show', $request->idee_id)->with('success', 'Commentaire ajouté avec succès.');
    }

    public function edit(Commentaire $commentaire)
    {
        return view('commentaires.edit', compact('commentaire'));
    }

    public function update(StoreUpdateCommentaireRequest $request, Commentaire $commentaire)
    {
        $commentaire->update($request->validated());

        return redirect()->route('idees.show', $commentaire->idee_id)->with('success', 'Commentaire mis à jour avec succès.');
    }

    public function destroy(Commentaire $commentaire)
    {
        $idee = $commentaire->idee;
        $commentaire->delete();

        return redirect()->route('idees.show', $idee)->with('success', 'Commentaire supprimé avec succès.');
    }
}
