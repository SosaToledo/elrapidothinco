<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Camionero extends Model
{
    protected $table = "camioneros";
    public $incrementing = 'id_camioneros';
}
