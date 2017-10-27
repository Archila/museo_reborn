<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tipo_adquisicione extends Model
{
    protected $table='tipo_adquisiciones';
    protected $primarykey='id';
    protected $fillable=[
    'nombre',
  ];
}
