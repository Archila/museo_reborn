<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pieza extends Model
{
    protected $table="piezas";
    //para insertar
    protected $primarykey="id";
    protected $fillable=[
      'cod_pieza','nombre','fotografia','id_tipopieza','codigo_qr',
      ];
}
