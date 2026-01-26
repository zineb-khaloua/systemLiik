<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use App\Models\Devis;
use App\Models\BonCommande;
use App\Models\BonLivraison;
use App\Models\Facture;
use App\Models\Achat;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
        'last_login_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function devises(){
        return $this->hasMany(Devis::class);
    }
    public function bon_commandes(){
        return $this->hasMany(BonCommande::class);
    }
    public function bon_livraisons(){
        return $this->hasMany(BonLivraison::class);
    }
    public function factures(){
        return $this->hasMany(Facture::class);
    }
    public function achats(){
        return $this->hasMany(Achat::class);
    }
   
        



}
