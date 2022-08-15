<?php

use App\Models\Backend\Permiso;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

if (!function_exists('isSuperAdmin')) {
    function isSuperAdmin()
    {
        return Session::get('rol_slug') == 'super_administrador';
    }
}
//función que se utiliza cuando trabajamos con la caché de 'redis' y la variable de sesión
if (!function_exists('canUser')) {
    function canUser($permiso, $redirect = true)
    {
        if (Session::get('rol_slug') == 'super_administrador') {
            return true;//Si el usuario es el 'super_administrador', puede entrar en cualquier parte del sistema,
                        //sin pasar por el módulo de 'permisos'
        } else {
            $rol_id = Session::get('rol_id');//este 'rol_id' viene de FortifyServiceProvider (lin 43)
            $permisos = Cache::tags('Permiso')->rememberForever("Permiso.rolid.$rol_id", function () use($rol_id) {
                return Permiso::whereHas('roles', function (Builder $query) use ($rol_id) {
                    $query->where('rol_id', $rol_id);
                })->get()->pluck('slug')->toArray();
            });
            if (!in_array($permiso, $permisos)) {
                if ($redirect) {
                    abort(403, 'No tienes permisos para entrar en este modulo');
                } else {
                    return false;
                }
            }
            return true;
        }
    }
}
