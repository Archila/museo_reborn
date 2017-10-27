<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tipo_visitantes extends Model
{
    protected $table = 'tipo_visitantes';
    protected $fillable = [
        'nombre',
    ];
}
