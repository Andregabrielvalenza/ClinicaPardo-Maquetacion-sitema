<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class UsuarioEmpresa extends Model
{
    protected $table="usuario_empresas";
    protected $fillable = ['id_user', 'id_empresa', 'fecha_add','cargo','codigo_acceso','estado','nickname'];

    public function Empresa()
    {
        return $this->hasOne('App\Empresa','id','id_empresa');
    }

}


