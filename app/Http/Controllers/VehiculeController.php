<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proprietaire;
use App\Models\Vehicule;



class VehiculeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicules = Vehicule::all();

        return view('vehicule.index', compact('vehicules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $proprietaires = Proprietaire::all();
        return view('vehicule.create', compact('proprietaires'));
        
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
            'immatriculation' => 'required|max:20',
            'marque' => 'required|max:50',
            'modele' => 'required|max:50',
            'couleur' => 'required|max:50',
            'carburant' => 'required|max:20',
            'type' => 'required|max:50',
            'id_proprietaire' => 'required',
        ]);
    
        $vehicule = Vehicule::create($validatedData);
    
        return redirect('/vehicules')->with('success', 'Vehicule créer avec succèss');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vehicules = Vehicule::findOrFail($id);
        return view('vehicule.show', compact('vehicules'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vehicule = Vehicule::findOrFail($id);

        return view('vehicule.edit', compact('vehicule'));
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
            'immatriculation' => 'required|max:20',
            'marque' => 'required|max:50',
            'modele' => 'required|max:50',
            'couleur' => 'required|max:50',
            'carburant' => 'required|max:20',
            'type' => 'required|max:50',
            'id_proprietaire' => 'required',
        ]);
    
        Vehicule::whereId($id)->update($validatedData);
    
        return redirect('/vehicules')->with('success', 'Vehicule mise à jour avec succèss');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vehicule = Vehicule::findOrFail($id);
        $vehicule->delete();
    
        return redirect('/vehicules')->with('success', 'Vehicule supprimer avec succèss');
    }
}
