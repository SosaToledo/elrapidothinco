<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comprobante extends Model
{
    protected $table = "comprobantes";
    public $incrementing = 'id_comprobantes';
}
