<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tarifa extends Model
{
    protected $table='tarifas';
    protected $fillable = [
        'activa','monto','inicio','final','rango','tipov',
    ];
    public static function towns($param1,$param2){
        return tarifa::
            where('tipov','=',$param1)
            ->where('rango','=',$param2)
            ->get();
    } 
    
}
