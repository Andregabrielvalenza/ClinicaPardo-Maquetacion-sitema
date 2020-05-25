<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seguro extends Model
{
    //protected $fillable = ['razon_social', 'nombre_comercial', 'ruc', 'telefono','direccion','email','nombres_contacto','email_contacto','telefono_contacto','nombres_contabilidad','email_contabilidad','telefono_contabilidad'];
    protected $fillable = ['nombre', 'aseguradora_id', 'tipo_seguro_id'];

    public function aseguradora()
    {
        return $this->hasOne('App\Aseguradora','id','aseguradora_id');
    }

    public function tipo_seguro()
    {
        return $this->hasOne('App\TipoSeguro','id','tipo_seguro_id');
    }

}


