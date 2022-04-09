<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    protected $table = "Facturas"; 
    protected $primaryKey = "id"; // no haria falta porque sigue el standart la tabla de la base de datos , se pone como aclaración

    // un cliente tiene muchos vehiculos 
    public function Averia()
    {
        return $this->belongsTo(Averia::class); // no se indica id porque sigue el standar
    }
    // un cliente tiene muchos vehiculos 
    public function Cliente()
    {
        return $this->belongsTo(Cliente::class); // no se indica id porque sigue el standar
    }
   

}
