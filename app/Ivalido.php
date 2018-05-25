<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ivalido extends Model
{
    protected $table = 'log_errores_email';
    protected $primaryKey = 'id';

    protected $fillable = [
        'email'
    ];
}
