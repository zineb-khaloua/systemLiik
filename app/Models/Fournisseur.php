<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BonCommande;
use App\Models\AchatItem;

class Fournisseur extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_fournisseur',
        'contact_nom',
        'telephone',
        'email',
        'adresse',
        'type_fournisseur',
        'statut',
        'ice',
        'if',
        'rc',
        'patente',
        'cnss',
        'telephone_secondaire',
        'form_juridique',
        'ville',
        'code_postal',
        'pays',
        'mode_paiement',
        'delai_paiement',
        'delai_livraison',
        'conditions_paiement',
        'date_expiration_contrat',
        'banque',
        'rib',
        'iban',
        'notes',
        'documents',
    ];

    public function bon_commandes(){
        return $this->hasMany(BonCommande::class);
    }
    public function achat_items(){
        return $this->hasMany(AchatItem::class);
    }
    
    public function contract_fournisseurs(){
        return $this->hasMany(ContractFournisseur::class);
    }

    public function produits()
{
    return $this->belongsToMany(Produit::class)
                ->withPivot('prix_achat','reference_fournisseur')
                ->withTimestamps();
}
}
