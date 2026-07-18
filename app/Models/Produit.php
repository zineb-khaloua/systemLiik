<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categorie;
use App\Models\DevisItem;
use App\Models\CommandeItem;
use App\Models\AchatItem;
use App\Models\LivraisonItem;
use App\Models\FactureItem;

class Produit extends Model
{
    use HasFactory;
    protected $fillable=[
        'categorie_id',
        'nom_produit',
        'designation',
       
        'prix_vente',
        'taux_tva',
        'stock_actuel',
        'stock_alert',
    ];

    public function categories(){
        return $this->belongsTo(Categorie::class);
    }
    public function fournisseurs()
{
    return $this->belongsToMany(Fournisseur::class)
                ->withPivot('prix_achat','reference_fournisseur')
                ->withTimestamps();
}
    public function devis_items(){
        return $this->hasMany(DevisItem::class);
    }
    public function commande_items(){
        return $this->hasMany(CommandeItem::class);
    }
    public function achat_items(){
        return $this->hasMany(AchatItem::class);
    }
    public function livraison_items(){
        return $this->hasMany(LivraisonItem::class);
    }
    public function facture_items(){
        return $this->hasMany(FactureItem::class);
    }


        
    
}
