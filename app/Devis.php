<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Devis extends Model
{
    
    public function prestation()
    {
        return $this->hasMany('App\Prestationdevis');
    }
}
