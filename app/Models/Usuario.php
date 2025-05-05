<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    protected $table = 'usuarios';

    protected $fillable = ['nome', 'senha'];

    public $timestamps = false;

    public function getAuthIdentifierName()
    {
        return 'nome';
    }

    public function getAuthPassword()
    {
        return $this->senha;
    }
}
