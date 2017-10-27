<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class autore extends Model
{
    protected $table="autores";
    protected $primarykey="id";
    protected $fillable=[
      'nombre','bibliografia',
    ];
}
