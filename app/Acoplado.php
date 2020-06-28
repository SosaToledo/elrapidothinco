<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acoplado extends Model
{
    protected $table = "acoplado";
    public $incrementing = 'id_acoplado';
    public $timestamps = true;

    protected $fillable = [
        'id_simple_acoplado', 'patente', 'vtv_vencimiento', 'senasa_vencimiento', 'seguro_vencimiento', 'created_at','updated_at'
    ];

}
