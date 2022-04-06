<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item_Prods extends Model
{
     protected $table = "ptem_prods";
    protected  $primaryKey = "id";








    public function Cliente()
    {
        return $this->belongsTo(Cliente::class, 'id');
    }
}
