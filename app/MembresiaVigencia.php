<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MembresiaVigencia extends Model
{
    protected $fillable = ['id_membresia', 'id_vigencia', 'precio'];


    public function membresia()
    {
        return $this->hasOne('App\Membresia','id','id_membresia');
    }
    public function vigencia()
    {
        return $this->hasOne('App\Vigencia','id','id_vigencia');
    }

}


