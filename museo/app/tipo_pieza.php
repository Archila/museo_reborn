<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tipo_pieza extends Model
{
    protected $table="tipo_piezas";
    protected $primarykey="id_tipo";
    protected $fillable=[
      'nombre'
    ];
}
