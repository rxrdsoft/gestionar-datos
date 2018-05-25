<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListaNegra extends Model
{
    protected $table = 'lista_negra';

    protected $primaryKey = 'id';

    protected $fillable = [
        'email',
        'categoria_id'
    ];
}
