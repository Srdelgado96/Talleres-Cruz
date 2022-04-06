<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Averia extends Model
{
    protected $table = "averias";
    protected  $primaryKey = "id";








    public function Cliente()
    {
        return $this->belongsTo(Cliente::class, 'id');
    }
}
