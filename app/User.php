<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'telefono', 'imagen', 'fecha_nacimiento', 'provider', 'provider_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function ultimaMembresia()
    {
        return $this->hasOne('App\UsuarioMembresia','id_user','id')->orderBy('fecha_compra', 'desc')->limit(1);
    }

    public function membresias()
    {
        return $this->hasMany('App\UsuarioMembresia','id_user','id');
    }

    public function primerEmpresa()
    {
        return $this->hasOne('App\UsuarioEmpresa','id_user','id')->orderBy('fecha_add', 'asc')->limit(1);
    }

    public function referidos()
    {
        return $this->hasMany('App\Referido','id_lider','id');
    }

    public function clientes()
    {
        return $this->hasMany('App\Cliente','id_user','id');
    }

    public function notificaciones()
    {
        return $this->hasMany('App\Notificacione','id_user','id');
    }

}
