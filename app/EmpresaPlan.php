<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class EmpresaPlan extends Model
{
    protected $table="empresa_planes";
    protected $fillable = ['id_empresa', 'id_plan', 'comision'];

    public function plan()
    {
        return $this->hasOne('App\Plan','id','id_plan');
    }

    public function empresa()
    {
        return $this->hasOne('App\Empresa','id','id_empresa');
    }

}


