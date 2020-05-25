<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class UsuarioEmpresaPlan extends Model
{
    protected $table="usuario_empresa_planes";
    protected $fillable = ['id_usuario_empresa', 'id_plan', 'comision'];

}


