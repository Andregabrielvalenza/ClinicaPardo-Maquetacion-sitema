<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $fillable = ['fecha_compra', 'prima', 'igv', 'id_cliente', 'id_usuario_empresa', 'id_plan_periodo'];

}


