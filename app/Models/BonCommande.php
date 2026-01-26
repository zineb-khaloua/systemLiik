<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Devis;
use App\Models\Fournisseur;
use App\Models\User;
use App\Models\CommandeItem;


class BonCommande extends Model
{
    use HasFactory;

    protected $fillable=[
        'fournisseur_id',
        'user_id',
        'devis_id',
        'numero',
        'date',
        'statut',
        'total_ht',
        'total_tva',
        'total_ttc',
        'notes',
    ];
    public function fournisseur(){
        return $this->belongsTo(Fournisseur::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function commande_items(){
        return $this->hasMany(CommandeItem::class);
    }
    public function devis(){
        return $this->belongsTo(Devis::class);
    }
}
