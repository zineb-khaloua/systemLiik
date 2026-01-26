<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Client;
use App\Models\User;
use App\Models\Commande;
use App\Models\LivraisonItem;

class BonLivraison extends Model
{
    use HasFactory;
    protected $fillable=[
        'client_id',
        'user_id',
        'commande_id',
        'numero',
        'date',
        'statut',
    ];
    public function client(){
        return $this->belongsTo(Client::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function commande(){
        return $this->belongsTo(Commande::class);
    }
    public function livraison_items(){
        return $this->hasMany(LivraisonItem::class);
    }
}
