<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BonCommande;
use App\Models\AchatItem;

class Fournisseur extends Model
{
    use HasFactory;

    protected $fillable=[
        'nom_fournisseur',
        'contact_nom',
        'telephone',
        'email',
        'adresse',
    ];

    public function bon_commandes(){
        return $this->hasMany(BonCommande::class);
    }
    public function achat_items(){
        return $this->hasMany(AchatItem::class);
    }
    

}
