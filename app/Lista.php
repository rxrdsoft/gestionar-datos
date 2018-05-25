<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lista extends Model
{
    protected $table = 'listas';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nombre_lista',
        'cantidad'
    ];

}
