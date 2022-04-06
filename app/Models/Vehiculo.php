<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    protected $table = "vehiculos";
    protected  $primaryKey = "id";




    // un cliente tiene muchos vehiculos e indicar el id de vehiculos
    public function Clientes()
    {
        return $this->belongsTo(Cliente::class);
    }



    

}
