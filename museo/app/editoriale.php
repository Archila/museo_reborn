<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class editoriale extends Model
{
    protected $table="editoriales";
    protected $primarykey="id";
    protected $fillable=[
      'nombre',
    ];
}
