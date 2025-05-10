<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cardapio extends Model
{
    public $timestamps = false;
    protected $table = 'cardapio';  
    protected $fillable = [
        'nome',
        'ingredientes',
        'categoria',
        'preco_p',
        'preco_m',
        'preco_g',
    ];
    
    
}
