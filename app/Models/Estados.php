<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estados extends Model
{
    protected $table = "estados";
    protected  $primaryKey ="id";

    public function Estado()
    {
        return $this->hasMany(Estado::class);
    }
    
}
