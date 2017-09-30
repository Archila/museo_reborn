<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fichas_informativa extends Model
{
    protected $table="fichas_informativas";
    protected $primarykey="id";
    protected $fillable=[
    'historia','multimedia','video','epoca','id_pieza',
     ];
}
