<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Client;
use App\Models\User;
use App\Models\DevisItem;
use App\Models\BonCommande;

class Devis extends Model
{
    use HasFactory;

    protected $fillable=[
        'client_id',
        'user_id',
        'numero',
        'date',
        'reference',
        'statut',
        'total_ht',
        'total_tva',
        'total_ttc',
        'notes',
    ];


    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function devis_items(){
        return $this->hasMany(DevisItem::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function bon_commandes(){
        return $this->hasMany(BonCommande::class);
    }
}

