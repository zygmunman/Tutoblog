<?php

namespace App\Models;

use App\Models\Backend\Rol;
use App\Models\Backend\Archivo;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'usuario';
    protected $guarded = [];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Este método será usado en toda la aplicación; cada vez que se invoque, nos
     * devolverá todos los roles que tiene el usuario que lo invoca.
     * Debido a los problemas de nomenclatura con el inglés (sería user_role), hemos de
     * indicar con qué tabla se relaciona este modelo Usuario con la tabla 'roles';
     * dicha tabla es 'usuario_rol', que funciona como puente.
     * El autor decide cambiar el plural de las tablas por el singular, igual que los modelos.
     * Al método 'belongsToMany' le pasamos la tabla puente ('usuario_rol') como segundo parámetro.
     *
     * @return void
     */
    public function roles()
    {
        return $this->belongsToMany(Rol::class, 'usuario_rol');
    }

    public function archivo()
    {
        return $this->morphOne(Archivo::class, 'archivable');
    }
}
