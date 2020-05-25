<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Referido extends Model
{
    protected $fillable = ['id_lider', 'id_miembro', 'estado'];

    public function lider()
    {
        return $this->hasOne('App\User','id','id_lider');
    }
    public function miembro()
    {
        return $this->hasOne('App\User','id','id_miembro');
    }

}


