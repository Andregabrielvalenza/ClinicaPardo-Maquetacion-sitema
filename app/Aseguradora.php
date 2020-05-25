<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aseguradora extends Model
{
    protected $fillable = ['nombre', 'correo', 'telf','ruc','direccion','nombre_contacto','apellido_contacto','telf_contacto','correo_contacto','logo'];


}


