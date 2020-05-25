<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Membresia extends Model
{
    protected $fillable = ['nombre', 'descripcion', 'resumen','icono','rol'];

    public function membresiaVigencias()
    {
        return $this->hasMany('App\MembresiaVigencia','id_membresia','id');
    }

}


