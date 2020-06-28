<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Camion extends Model
{
    protected $table = "camiones";
    public $incrementing = 'id_camiones';
}
