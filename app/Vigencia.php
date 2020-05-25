<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vigencia extends Model
{
    protected $fillable = ['nombre', 'cant_meses'];

    public function membresiaVigencias()
    {
        return $this->hasMany('App\MembresiaVigencia','id_vigencia','id');
    }
}


