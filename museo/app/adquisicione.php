<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class adquisicione extends Model
{
    protected $table='adquisiciones';
    protected $primarykey='id';
    public $timestamps=true;
    protected $fillable=[
    'fecha','idpieza','iddonante','idempleado','idtipoad'
    ];
}
