<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achat extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero',
        'fournisseur_id',
        'user_id',
        'date_achat',
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
    public function achat_items(){
        return $this->hasMany(AchatItem::class);
    }
}
