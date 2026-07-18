<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContractFournisseur extends Model
{
    use HasFactory;
    protected $fillable=[
        'fournisseur_id',
        'reference_contrat',
        'date_signature',
        'date_debut',
        'date_expiration',
        'fichier_pdf',
        'conditions',
        'statut',
    ];

    public function fournisseur(){
        return $this->belongsTo(Fournisseur::class);
    }
}
