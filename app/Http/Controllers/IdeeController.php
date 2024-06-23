<?php

namespace App\Http\Controllers;

use App\Models\Idee;
use App\Models\Categorie;
use App\Http\Requests\StoreUpdateIdeeRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\IdeeStatusNotification;

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

    /**
     * Approve the specified resource.
     */
    public function approve($id)
    {
        $idee = Idee::findOrFail($id);
        $idee->status = 'acceptée';
        $idee->save();

        // Envoyer l'email de notification
        Mail::to($idee->auteur_email)->send(new IdeeStatusNotification($idee, $idee->status));

        return redirect()->route('idees.index')->with('success', 'Idée approuvée et email envoyé.');
    }

    public function reject($id)
    {
        $idee = Idee::findOrFail($id);
        $idee->status = 'refusée';
        $idee->save();

        // Envoyer l'email de notification
        Mail::to($idee->auteur_email)->send(new IdeeStatusNotification($idee, $idee->status));

        return redirect()->route('idees.index')->with('success', 'Idée refusée et email envoyé.');
    }    
}
