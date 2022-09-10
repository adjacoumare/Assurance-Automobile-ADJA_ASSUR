<?php

namespace App\Http\Controllers;

use App\Models\Proprietaire;
use Illuminate\Http\Request;

class ProprietaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proprietaires = Proprietaire::all();

        return view('proprietaire.index', compact('proprietaires'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('proprietaire.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|max:150',
            'prenom' => 'required|max:150',
            'adresse' => 'required|max:100',
            'telephone' => 'required|max:50',
            'fonction' => 'required|max:50',
        ]);
    
        $proprietaire = Proprietaire::create($validatedData);
    
        return redirect('/proprietaires')->with('success', 'Proprietaire ajouter avec succèss');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proprietaire = Proprietaire::findOrFail($id);
        return view('proprietaire.show', compact('proprietaire'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proprietaire = Proprietaire::findOrFail($id);

        return view('proprietaire.edit', compact('proprietaire'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nom' => 'required|max:150',
            'prenom' => 'required|max:150',
            'adresse' => 'required|max:100',
            'telephone' => 'required|max:50',
            'fonction' => 'required|max:50',
        ]);
    
        Proprietaire::whereId($id)->update($validatedData);
    
        return redirect('/proprietaires')->with('success', 'Proprietaire mise à jour avec succèss');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $proprietaire = Proprietaire::findOrFail($id);
        $proprietaire->delete();
    
        return redirect('/proprietaires')->with('success', 'Proprietaire supprimer avec succèss');
    }
}
