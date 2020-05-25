<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TiposDeSeguro extends Model
{
    protected $table = "tipos_de_seguros";
    protected $fillable = ['nombre', 'icono'];

    public function planes()
    {
        return $this->hasMany('App\Plan','id_tipo_de_seguro','id');
    }
}


