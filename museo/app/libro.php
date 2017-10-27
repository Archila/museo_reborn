<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class libro extends Model
{
    protected $table="libros";
    protected $primarykey="id";
    protected $fillable=[
      'nombre','anio','edicion','paginas','idautor','ideditorial','idcategoria','idempleado',
    ];
}
