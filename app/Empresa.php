<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $fillable = ['nombre_comercial', 'ruc', 'telf', 'correo', 'direccion'];

    public function planes_por_tipo($idtipo)
    {
        $planes=Empresa::select('planes.*')
        ->join('empresa_planes','empresa_planes.id_empresa','empresas.id')
        ->join('planes','planes.id','empresa_planes.id_plan')
        ->where('planes.id_tipo_de_seguro',$idtipo)
        ->where('empresas.id',$this->id)->get();
        return $planes;
    }

    public function planes_por_tipo_nuevo($idtipo)
    {
        $empresa = Empresa::with(['empresaplanes.plan' => function ($query) use ($idtipo) {
            $query->where('id_tipo_de_seguro', $idtipo);
        },'empresaplanes.plan.aseguradora'])->where('empresas.id',$this->id)->first();
        return $empresa;
    }

    public function empresaplanes()
    {
        return $this->hasMany('App\EmpresaPlan','id_empresa','id');
    }
}


