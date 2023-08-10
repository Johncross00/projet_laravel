<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $primaryKey = 'idArticle'; //  la clé primaire

    protected $fillable = [
        'titreArticle', 
        'stock', 
        'prixArti', 
        'détails', 
        'transport', 
        'délaiClôture'
    ];
}
