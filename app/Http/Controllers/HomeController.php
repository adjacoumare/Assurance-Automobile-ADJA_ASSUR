<?php

namespace App\Http\Controllers;

use App\Models\Proprietaire;
use App\Models\Vehicule;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $proprietaire = Proprietaire::all();
        $vehicule = Vehicule::all();
        
        // Nous allons compter tous les assurés inscrits 

        $nombreproprietaire = count($proprietaire);
        $nombrevehicule = count($vehicule);

        // Nous allons afficher la liste des assurés


        return view('home', compact('proprietaire','nombreproprietaire', 'nombrevehicule', 'vehicule' ));
    }


    public function welcome(){
        
        return view('welcome');
    }

    public function register(){
        
        return view('auth.register');
    }

    public function login(){
        
        return view('auth.login');
    }

    public function dashboard()
    {
        $proprietaire = Proprietaire::all();
        $vehicule = Vehicule::all();
        
        // Nous allons compter tous les assurés inscrits 

        $nombreproprietaire = count($proprietaire);
        $nombrevehicule = count($vehicule);


        return view('home', compact('proprietaire','nombreproprietaire', 'nombrevehicule', 'vehicule'));
    }
}
