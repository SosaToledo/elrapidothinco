<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    protected $table = "provincia";
    public $incrementing = 'id_provincia';

    
    protected $fillable = [
        'id','provincia_nombre'
    ];

}