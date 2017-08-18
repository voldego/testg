<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prestationdevis extends Model
{
    //
    public function devis(){

    	return $this->belongsTo('App\Devis');
    }

}
