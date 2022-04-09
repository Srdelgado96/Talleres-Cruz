<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
   //no se le indica la tambla porque sigue el standar de que el modelo se llamda igual que la tabla en la db
    protected  $primaryKey = "id";
    public function Item_Prods()
    {
        return $this->belongsTo(Item_Prods::class, 'id');
    }
}
