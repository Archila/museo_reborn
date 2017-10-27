<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class genero extends Model
{
    protected $table="generos";
    protected $primarykey="id";
    protected $fillable=[
      'genero',
    ];
}
