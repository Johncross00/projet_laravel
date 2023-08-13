<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $primaryKey = 'idProd';

    protected $fillable = [
        'nameProd',
        'imageProd',
        'prixProd',
        'transport',
        'delaiCloture',
        'details'
    ];
}
