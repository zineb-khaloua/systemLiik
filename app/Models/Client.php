<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Devis;
use App\Models\BonCommande;
use App\Models\BonLivraison;
use App\Models\Facture;

class Client extends Model
{
    use HasFactory;
    protected $fillable=[
        'nom_complet',
        'adresse',
        'telephone',
        'email',
        'ville',
        

    ];

    public function  devis(){

        return $this->hasMany(Devis::class);
    }
    public function bon_livraisons(){
        return $this->hasMany(BonLivraison::class);
    }
    public function bon_commandes(){
        return $this->hasMany(BonCommande::class);
    }
    public function factures(){
        return $this->hasMany(Facture::class);
    }
      
}
