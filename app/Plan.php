<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $table = "planes";
    protected $fillable = ['id_aseguradora', 'nombre', 'id_tipo_de_seguro', 'cobertura' , 'interes'];

    public function aseguradora()
    {
        return $this->hasOne('App\Aseguradora','id','id_aseguradora');
    }

    public function tipodeseguro()
    {
        return $this->hasOne('App\TiposDeSeguro','id','id_tipo_de_seguro');
    }

}


