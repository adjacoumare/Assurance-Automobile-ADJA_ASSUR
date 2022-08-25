<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{
    use HasFactory;
    protected $fillable = ['immatriculation', 'marque', 'modele', 'couleur', 'carburant', 'type', 'id_proprietaire'];

    public function proprietaire(){
        return $this->belongsTo(Proprietaire::class, 'id_proprietaire');
    }
}
