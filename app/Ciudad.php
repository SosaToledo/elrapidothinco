<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    protected $table = "ciudades";
    public $incrementing = 'id_ciudades';

    
    protected $fillable = [
        'id','ciudad_nombre','cp','provincia_id'
    ];

}