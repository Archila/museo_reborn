<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class donante extends Model
{
  protected $table='donantes';
protected $primarykey='id';
protected $fillable=[
'id','nombre','apellido','telefono','email'
];
}
