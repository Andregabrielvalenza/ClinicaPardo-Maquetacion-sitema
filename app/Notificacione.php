<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notificacione extends Model
{

    protected $fillable = ['fecha_enviado', 'remitente', 'asunto', 'mensaje', 'adjunto', 'estado', 'id_user'];

}


