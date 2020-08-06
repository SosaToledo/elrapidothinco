<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Viaje extends Model
{
    protected $table = "viajes";
    public $incrementing = 'id_viajes';
    public $timestamps = true;

    protected $fillable = [
        'id_camiones',
        'id_acomplado',
        'id_camionero',
        'id_cliente',
        'idSimpleViaje',
        'km_inicial',
        'km_final',
        'distancia',
        'origen',
        'destino',
        "remitos",
        "carta_porte",
        "cantidad",
        "precio",
        'valor',
        'ganancia_camionero',
        'tipoCamion',
        'fecha',
        'peajes',
        'gasoil_litros',
        'gasoil_precio',
        'notaViaje',
        'guia',
        'estados',
        'created_at',
        'updated_at'
    ];
}