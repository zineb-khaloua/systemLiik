<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Achat;
use App\Models\Produit;

class AchatItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'achat_id',
        'produit_id',
        'designation',
        'description',
        'quantite',
        'prix_unitaire',
        'taux_tva',
    ];

    public function achat(){
        return $this->belongsTo(Achat::class);
    }
    public function produit(){
        return $this->belongsTo(Produit::class);
    }
    
}
