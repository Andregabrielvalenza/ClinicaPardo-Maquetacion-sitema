<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = ['nombre', 'apellido', 'telf','correo','direccion','foto_perfil','fecha_nacimiento','estado'];

}


