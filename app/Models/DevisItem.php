<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Devis;
use App\Models\Produit;


class DevisItem extends Model
{
    use HasFactory;

    protected $fillable=[
        'devis_id',
        'produit_id',
        'designation',
        'description',
        'quantite',
        'prix_unitaire',
        'taux_tva',
    ];

    public function devis(){
        return $this->belongsTo(Devis::class);
    }
    public function produit(){
        return $this->belongsTo(Produit::class);
    }

}

