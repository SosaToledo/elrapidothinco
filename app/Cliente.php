<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = "clientes";
    public $incrementing = 'id_clientes';
    public $timestamps = true;

    protected $fillable = [
        'id_simple_clientes', 
        'cuil', 
        'nombre', 
        'direccion', 
        'telefono', 
        'correo', 
        'created_at',
        'updated_at'
    ];
}