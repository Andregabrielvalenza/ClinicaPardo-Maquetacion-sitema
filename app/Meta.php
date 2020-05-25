<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Meta extends Model
{
    protected $fillable = ['nombre', 'tipo_meta', 'valor_meta', 'fecha_inicio' , 'fecha_fin','dirigido','id_usuario_empresa'];

}


