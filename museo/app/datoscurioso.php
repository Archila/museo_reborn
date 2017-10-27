<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class datoscurioso extends Model
{
    protected $table='datoscuriosos';
    protected $primarykey='id';
    public $timestamps=true;
    protected $fillable=[
    'id','dato',
];
}
