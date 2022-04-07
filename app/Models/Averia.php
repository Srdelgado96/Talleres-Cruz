<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Averia extends Model
{
    protected $table = "averias";
    protected  $primaryKey = "id";




    public function Estado()
    {
        return $this->belongsTo(Estados::class);
    }



    public function Cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
    public function Vehiculo()
    {
        return $this->belongsTo(Vehiculo::class);
    }

    public function User()
    {
        return $this->belongsTo(\App\User::class);
    }
}
