<?php

namespace App\Models\Backend;

use App\Models\Backend\Rol;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Permiso extends Model
{
    use HasFactory;
    protected $table = 'permiso';
    protected $guarded = [];

    public function roles(){
        return $this->belongsToMany(Rol::class, 'permiso_rol');
    }
}
