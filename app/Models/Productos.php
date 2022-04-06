<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    protected $table = "prodcutos";
    protected  $primaryKey = "id";








    public function Item_Prods()
    {
        return $this->belongsTo(Item_Prods::class, 'id');
    }
}
