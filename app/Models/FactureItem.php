<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Facture;
use App\Models\Produit;

class FactureItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'facture_id',
        'produit_id',
        'designation',
        'description',
        'quantite',
        'prix_unitaire',
        'taux_tva',
    ];

    public function facture(){
        return $this->belongsTo(Facture::class);
    }
    public function produit(){
        return $this->belongsTo(Produit::class);
    }
   
}
