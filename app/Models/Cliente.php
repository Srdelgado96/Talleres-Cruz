<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table ="clientes";
    protected  $primaryKey = "id";




// un cliente tiene muchos vehiculos e indicar el id de vehiculos
    public function Vehiculo()
    {
        return $this->belongsTo(Vehiculo::class);
    }



    // public function Averias()
    // {
    //     return $this->belongsTo(Averia::class, 'id');
    // }
}
