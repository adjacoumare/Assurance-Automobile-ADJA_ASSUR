<?php

namespace App\Http\Controllers;

use App\Models\Paiement;
use App\Models\Proprietaire;
use Illuminate\Http\Request;

class PaiementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paiements = Paiement::all();

    return view('paiement.index', compact('paiements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proprietaires = Proprietaire::all();
        return view('paiement.create', compact('proprietaires'));
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
            'montant' => 'required|max:255',
            'date' => 'required',
            'id_proprietaire' => 'required',
        ]);
    
        $paiement = Paiement::create($validatedData);
    
        return redirect('/paiements')->with('success', 'Paiement effectuer avec succèss');
    }

    // public function paiementForm()
    // {
    //     $assures = Assure::all();
    //     return view('paiement.assurePaiement', compact('assures'));
    // }


    public function assurePaiement(Request $request, $id)
    {
        dd($id);
        $validatedData = $request->validate([
            'montant' => 'required|max:255',
            'date' => 'required',
            'id_assure' => 'required',
        ]);
    
        $paiement = Paiement::create($validatedData);
    
        return redirect('/paiements')->with('success', 'Paiement effectuer avec succèss');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $paiements = Paiement::findOrFail($id);
        return view('paiement.show', compact('paiements'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $paiement = Paiement::findOrFail($id);

        return view('paiement.edit', compact('paiement'));
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
            'montant' => 'required|max:255',
            'date' => 'required',
            'id_proprietaire' => 'required',
        ]);
    
        Paiement::whereId($id)->update($validatedData);
    
        return redirect('/paiements')->with('success', 'Paiement mise à jour avec succèss');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $paiement = Paiement::findOrFail($id);
        $paiement->delete();

    return redirect('/paiements')->with('success', 'Paiement supprimer avec succèss');
    }
}
