<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    use HasFactory;

    protected $fillable = ['montant', 'date', 'id_proprietaire'];

    public function proprietaire(){
        return $this->belongsTo(Proprietaire::class, 'id_proprietaire');
    }
}