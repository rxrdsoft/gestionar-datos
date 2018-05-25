<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlancaLista extends Model
{
    protected $table = 'blanca_lista';

    protected $primaryKey = 'id';

    protected $fillable = [
        'lista_blanca_id',
        'lista_id'
    ];
}
