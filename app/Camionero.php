<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Camionero extends Model
{
    protected $table = "camioneros";
    public $incrementing = 'id_camioneros';
    public $timestamps = true;

    protected $fillable = [
        'id_simple_camioneros', 'DNI', 'telefono', 'nombre', 'apellido', 'direccion', 'password', 'created_at','updated_at'
    ];
}
