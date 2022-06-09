<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class passe extends Model
{
    //

    public function commande()
    {
        return $this->belongsToMany(commande::class);
    }
}
