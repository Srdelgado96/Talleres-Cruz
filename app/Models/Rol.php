<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = "rols";
    protected  $primaryKey = "id";








    public function Users()
    {
        return $this->belongsTo(User::class, 'id');
    }
}
