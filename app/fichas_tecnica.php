<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fichas_tecnica extends Model
{
    protected $table="fichas_tecnicas";
    protected $primarykey="id";
    protected $fillable=[
    'peso','altura','ancho','genero','idpieza',
      ];
}
