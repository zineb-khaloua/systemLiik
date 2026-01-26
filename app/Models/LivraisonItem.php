<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BonLivraison;
use App\Models\Produit;

class LivraisonItem extends Model
{
    use HasFactory;
    protected $fillable=[
        'livraison_id',
        'produit_id',
        'designation',
        'description',
        'quantite',
    ];
    public function livraison(){
        return $this->belongsTo(BonLivraison::class);
    }
    public function produit(){
        return $this->belongsTo(Produit::class);
    }
}
