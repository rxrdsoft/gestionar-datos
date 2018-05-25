<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListaBlanca extends Model
{
    protected $table = 'lista_blanca';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nombre',
        'apellido',
        'email',
        'sms',
        'fecha_cumpleanios',
        'estado_civil',
        'genero',
        'profesion_ocupacion',
        'sector_trabajo',
        'direccion',
        'distrito',
        'provincia',
        'departamento'
    ];
}
