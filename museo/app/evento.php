<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class evento extends Model
{
    protected $table='eventos';
    protected $primarykey='id';
    public $timestamps=true;
    protected $fillable=[
    'id','nombre','descripcion','fecha_inicial','fecha_final','activo',
  ];
}
