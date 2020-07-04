<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comprobante extends Model
{
    protected $table = "comprobantes";
    public $incrementing = 'id_comprobantes';
    public $timestamps = true;

    protected $fillable = [
        'id_simple_comprobante', 
        'id_camioneros', 
        'id_viaje', 
        'detalles', 
        'tipo',
        'monto',
        'created_at',
        'updated_at'
    ];
}
