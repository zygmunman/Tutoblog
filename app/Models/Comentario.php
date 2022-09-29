<?php

namespace App\Models;

use App\Models\Usuario;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comentario extends Model
{
    use HasFactory;
    protected $table = "comentario";
    protected $guarded = [];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }

    public function hijo()
    {
        return $this->belongsTo(Comentario::class, 'comentario_id');
    }
}
