<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Camion extends Model
{
    protected $table = "camiones";
    public $incrementing = 'id_camiones';
    public $timestamps = true;

    protected $fillable = [
        'id_simple_camiones', 'patente', 'vtv_vencimiento', 'senasa_vencimiento', 'seguro_vencimiento', 'created_at','updated_at'
    ];
}
