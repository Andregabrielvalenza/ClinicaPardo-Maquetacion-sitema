<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsuarioMembresia extends Model
{
    protected $fillable = ['id_membresia_vigencia', 'id_user', 'fecha_compra', 'transaccion', 'precio_compra', 'igv'];

    public function membresiaVigencia()
    {
        return $this->hasOne('App\MembresiaVigencia','id','id_membresia_vigencia');
    }
    public function usuario()
    {
        return $this->hasOne('App\User','id','id_user');
    }

}


