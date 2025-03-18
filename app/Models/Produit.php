<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;
    protected $fillable = ['nom', 'description', 'prix', 'image'];

    public function commandes()
    {
        return $this->belongsToMany(Commande::class)->withPivot('quantite');
    }
}
