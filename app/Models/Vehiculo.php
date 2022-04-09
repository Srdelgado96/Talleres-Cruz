<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    protected $table = "vehiculos";
    protected $primaryKey = "id";



    // un cliente tiene muchos vehiculos 
    public function Cliente()
    {
        return $this->belongsTo(Cliente::class);// no se indica id porque sigue el standar
    }



    

}
