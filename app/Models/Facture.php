<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FactureItem;
use App\Models\Client;
use App\Models\User;
use App\Models\Devis;

class Facture extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id',
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

    public function client(){
        return $this->belongsTo(Client::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function devis(){
        return $this->belongsTo(Devis::class);
    }
    public function facture_items(){
        return $this->hasMany(FactureItem::class);
    }
}
