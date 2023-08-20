<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    protected $primaryKey = 'idComm';

    protected $fillable = [
        'user_id', // Clé étrangère vers la table users
        'product_id', // Clé étrangère vers la table products
        'quantite', // Quantité du produit commandé
        'montant_total', // Montant total de la commande
        'date_commande', // Date de la commande
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
