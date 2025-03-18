<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;
    protected $fillable = ['client_id'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function produits()
    {
        return $this->belongsToMany(Produit::class)->withPivot('quantite');
    }
}
